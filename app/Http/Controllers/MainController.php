<?php

namespace App\Http\Controllers;

use App\Category;
use App\Partner;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Вывод главной страницы
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = app('Cart');
        $cartContent = $cart->content;
        $favoritesList = app('FavoriteList');
        $favoritesListContent = $favoritesList->content;
        return view('pages.main', ['cartContent' => $cartContent, 'favoritesListContent' => $favoritesListContent]);
    }

    public function showStore(Request $request, $storeSlug)
    {
        $cart = app('Cart');
        $cartContent = $cart->content;
        $favoritesList = app('FavoriteList');
        $favoritesListContent = $favoritesList->content;
        $currentStore = Partner::where('slug', $storeSlug)->firstOrFail();
        $likedRandomProducts = $currentStore->products()->inRandomOrder()->take(4)->get();
        $storeCatalog = Category::getCatalog($currentStore->id);
        return view('pages.store', [
            'cartContent' => $cartContent,
            'favoritesListContent' => $favoritesListContent,
            'currentStore' => $currentStore,
            'likedRandomProducts' => $likedRandomProducts,
            'storeCatalog' => $storeCatalog,
        ]);
    }
}
