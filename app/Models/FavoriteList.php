<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class FavoriteList extends Model
{
    const FAVORITE_LIST_ID_COOKIE_NAME = 'favoriteListId';
    const FAVORITE_LIST_ID_COOKIE_EXPIRES = 30 * 24 * 3600;

    protected $products;

    public static function current()
    {
        if (Auth::check()) {
            return static::getByUserId(Auth::id());
        }
        return static::currentByCookie();
    }

    private static function currentByCookie()
    {
        $cookie = Cookie::get(self::FAVORITE_LIST_ID_COOKIE_NAME);
        if ($cookie) {
            try {
                $favoriteListId = Crypt::decrypt(Cookie::get(self::FAVORITE_LIST_ID_COOKIE_NAME), false);
            } catch (\Exception $exception) {
                $favoriteListId = $cookie;
            }
        } else {
            $favoriteListId = null;
        }
        $favoriteList = static::where('id', $favoriteListId)->firstOr(function () {
            $favoriteList = new FavoriteList();
            $favoriteList->content = [];
            $favoriteList->save();
            Cookie::queue(self::FAVORITE_LIST_ID_COOKIE_NAME, $favoriteList->id, self::FAVORITE_LIST_ID_COOKIE_EXPIRES);
            return $favoriteList;
        });
        return $favoriteList;
    }

    private static function getByUserId($userId)
    {
        $favoriteList = static::where('user_id', $userId)->firstOr(function () use ($userId) {
            $favoriteList = new FavoriteList();
            $favoriteList->content = [];
            $favoriteList->user_id = $userId;
            $favoriteList->save();
            return $favoriteList;
        });
        return $favoriteList;
    }

    public function getContentAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = json_encode($value);
    }

    /**
     * Добавляет товар в избранное
     *
     * @param int $productId
     */
    public function addProduct(int $productId)
    {
        $content = $this->content;
        if (!in_array($productId, $content)) {
            $content[] = $productId;
        }
        $this->content = $content;
        $this->save();
        $this->initProducts();
    }

    /**
     * Удаляет товар из избранного
     *
     * @param int $productId ID товара
     */
    public function removeProduct(int $productId)
    {
        $content = $this->content;
        $key = array_search($productId, $content);
        if ($key !== false) {
            unset($content[$key]);
        }
        $this->content = $content;
        $this->save();
        $this->initProducts();
    }

    /**
     * Очищает избранное
     */
    public function clear()
    {
        $this->content = [];
        $this->save();
    }

    public function countTotalQuantity()
    {
        return count($this->content);
    }

    protected function initProducts()
    {
        $this->products = Product::find($this->content);
    }

    public function getProducts()
    {
        if (is_null($this->products)) {
            $this->initProducts();
        }
        return $this->products;
    }

    public static function mergeFavorites($userId)
    {
        $cookieFavorites = static::currentByCookie();
        $userIdFavorites = static::getByUserId($userId);
        $mergedContent = array_merge($cookieFavorites, $userIdFavorites);
        $mergedContent = array_unique($mergedContent);
        $userIdFavorites->content = $mergedContent;
        $userIdFavorites->save();
        $userIdFavorites->delete();
    }

    public static function deleteExpiredFavorites()
    {
        Cart::where('updated_at', '<', Carbon::now()->subSeconds(self::FAVORITE_LIST_ID_COOKIE_EXPIRES))->whereNull('user_id')->delete();
    }

}
