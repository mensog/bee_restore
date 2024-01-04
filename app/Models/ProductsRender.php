<?php
/**
 * Created by PhpStorm.
 * User: Гагарин
 * Date: 21.09.2020
 * Time: 13:04
 */

namespace App;


class ProductsRender
{
    public const PRODUCTS_PER_PAGE = 50;

    public $productsQuery;
    public $products;
    public $breadcrumbs;
    public $cartContent;
    public $favoritesListContent;
    public $currentCategory;
    public $activeCategorySlugs;
    public $stores;
    public $storeIds;
    public $filterStores;
    public $filterPriceFrom;
    public $filterPriceTo;
    public $pageName;
    public $pageRootRoute;
    public $sidebarRouteName;
    public $skipQuery;


    public function __construct($request, $categoryName)
    {
        $this->skipQuery = false;
        $cart = app('Cart');
        $this->cartContent = $cart->content;

        $favoritesList = app('FavoriteList');
        $this->favoritesListContent = $favoritesList->content;

        if ($categoryName == '') {
            $this->productsQuery = Product::query();
            $this->breadcrumbs = [];
            $category = null;
            $this->activeCategorySlugs = [];
        } else {
            $category = Category::where('friendly_url_name', $categoryName)->firstOrFail();
            $this->productsQuery = $category->productsWithChildQuery();
            $this->breadcrumbs = $category->getBreadcrumbs();
            $this->activeCategorySlugs = array_keys($this->breadcrumbs);
        }

        $this->parseStoreIds($request);
        $this->parsePriceFrom($request);
        $this->parsePriceTo($request);

        $this->stores = Partner::all();
    }

    protected function parseStoreIds($request)
    {
        if($request->has('storeId')) {
            $this->storeIds = explode(',', $request->storeId);
            $this->productsQuery->whereIn('store_id', $this->storeIds);
        } else {
            $this->storeIds = [];
        }
    }

    protected function parsePriceFrom($request)
    {
        $priceFrom = (int)$request->priceFrom * 100;
        if ($priceFrom > 0 && $priceFrom < 1e9) {
            $this->filterPriceFrom = $priceFrom;
            $this->productsQuery->where('price', '>=', $this->filterPriceFrom);
        }
    }

    protected function parsePriceTo($request)
    {
        $priceTo = (int)$request->priceTo * 100;
        if ($priceTo > 0 && $priceTo < 1e9) {
            $this->filterPriceTo = $priceTo;
            $this->productsQuery->where('price', '<=', $this->filterPriceTo);
        }
    }

    public function initProducts()
    {
        if (!$this->skipQuery) {
            $this->products = $this->productsQuery->paginate(self::PRODUCTS_PER_PAGE)->appends(request()->query());
        }
    }
}
