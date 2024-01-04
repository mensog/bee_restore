<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;
    
    public const ICON_DIRECTORY = '/public/icons/';
    public const COMMON_CATALOG_CACHE_KEY = 'commonCatalog';
    public const COMMON_CATALOG_CACHE_TTL = 60 * 60;
    public const STORE_CATALOG_CACHE_KEY = 'storeCatalog:';
    public const STORE_CATALOG_CACHE_TTL = 60 * 60;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function(Category $category){
            $category->deleteIcon();
        });
    }

    /**
     * Возвращает все продукты из текущей категории
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function partner()
    {
        return $this->belongsTo('App\Partner', 'store_id', 'id');
    }

    public function parentCategory()
    {
        return $this->belongsTo('App\Category', 'parent', 'id');
    }

    public function childCategories()
    {
        return $this->hasMany('App\Category', 'parent', 'id');
    }

    public function setParent($parentId)
    {
        if ($parentId == 0) {
            $this->parent = null;
        } else {
            Category::findOrFail($parentId);
            $this->parent = $parentId;
        }
    }

    public function getBreadcrumbs()
    {
        $result = [];
        $parent = $this->parentCategory;
        if ($parent) {
            $parentBreadcrumbs = $parent->getBreadcrumbs();
            if ($parentBreadcrumbs) {
                $result = array_merge($parentBreadcrumbs, [$this->friendly_url_name => $this->name]);
                return $result;
            } else {
                return [$this->friendly_url_name => $this->name];
            }
        } else {
            return [$this->friendly_url_name => $this->name];
        }
    }

    public static function getCatalog($storeId)
    {
        $cacheKey = self::STORE_CATALOG_CACHE_KEY . $storeId;
        $cachedCatalog = Redis::get($cacheKey);
        if ($cachedCatalog) {
            return unserialize($cachedCatalog);
        }
        $categoriesToDisplay = self::getNonEmptyCategoryIds($storeId);
        $groupedCategories = Category::whereNull('parse_url')->whereIn('id', $categoriesToDisplay)->orderBy('parent')->orderBy('name')->get()->groupBy('parent');
        Redis::set($cacheKey, serialize($groupedCategories), 'EX', self::STORE_CATALOG_CACHE_TTL);
        return $groupedCategories;
    }

    public static function getCommonCatalog()
    {
        $cachedCatalog = Redis::get(self::COMMON_CATALOG_CACHE_KEY);
        if ($cachedCatalog) {
            return unserialize($cachedCatalog);
        }
        $groupedCategories = Category::whereNull('parse_url')->where('visible', 1)->orderBy('parent')->orderBy('name')->get()->groupBy('parent');
        Redis::set(self::COMMON_CATALOG_CACHE_KEY, serialize($groupedCategories), 'EX', self::COMMON_CATALOG_CACHE_TTL);
        return $groupedCategories;
    }

    public static function getNonEmptyCategoryIds($storeId)
    {
        $categoryParents = Category::whereNull('parse_url')->get()->pluck('parent', 'id')->toArray();
        $productsInCategory = DB::table('products')
            ->select(DB::raw('count(*) as count, category_id'))->getValue(DB::connection()->getQueryGrammar())
            ->where('store_id', $storeId)
            ->groupBy('category_id')
            ->get()
            ->pluck('count', 'category_id')
            ->toArray();

        $categoriesToDisplay = [];
        foreach ($productsInCategory as $categoryId => $count) {
            $categoriesToDisplay = array_merge($categoriesToDisplay, self::getParentIds($categoryId, $categoryParents));
        }
        return $categoriesToDisplay;
    }

    public static function getParentIds($parentCategoryId, $allCategories)
    {
        if (!isset($allCategories[$parentCategoryId]) || is_null($allCategories[$parentCategoryId])) {
            return [$parentCategoryId];
        } else {
            return array_merge([$parentCategoryId], self::getParentIds($allCategories[$parentCategoryId], $allCategories));
        }
    }

    public function getChildCategoryIds()
    {
        $categoryIds = [];
        $childCategories = $this->childCategories;
        foreach ($childCategories as $child) {
            $categoryIds = array_merge($categoryIds, [$child->id], $child->getChildCategoryIds());
        }
        return $categoryIds;
    }

    public function productsWithChildQuery()
    {
        $childCategories = $this->getChildCategoryIds();
        return Product::whereIn('category_id', array_merge([$this->id], $childCategories));
    }

    public function deleteIcon()
    {
        if (!is_null($this->icon_path) && Storage::exists($this->icon_path)) {
            Storage::delete($this->icon_path);
        }
        $this->icon_path = null;
        $this->save();
    }
}
