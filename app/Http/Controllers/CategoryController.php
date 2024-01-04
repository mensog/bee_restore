<?php

namespace App\Http\Controllers;

use App\ProductsCatalogRender;
use App\ProductsSearchRender;
use Illuminate\Http\Request;

class CategoryController extends ProductsRenderController
{
    public const PRODUCTS_PER_PAGE = 50;

    /**
     * Вывод товаров из категории, или общий список товаров если категория не выбрана
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $name = '')
    {
        $productsRender = new ProductsCatalogRender($request, $name);
        $productsRender->initProducts();
        return view('pages.catalog', [
            'productsRender' => $productsRender,
        ]);
    }

    public function search(Request $request, $name = '')
    {
        $productsRender = new ProductsSearchRender($request, $name);
        $productsRender->initProducts();
        return view('pages.catalog', [
            'productsRender' => $productsRender,
        ]);
    }

    public function apiIndex(Request $request)
    {
        $name = $request->has('name') ? $request->input('name') : '';
        $productsRender = new ProductsCatalogRender($request, $name);
        $productsRender->initProducts();
        $response = [];
        $response['html'] = view('components.products-list', [
            'products' => $productsRender->products,
            'cartContent' => $productsRender->cartContent,
            'favoritesListContent' => $productsRender->favoritesListContent,
        ])->render();
        $response['breadcrumbs'] = view('components.breadcrumbs',[
            'pageRootRoute' => $productsRender->pageRootRoute,
            'pageRootName' => $productsRender->pageName,
            'breadcrumbs' => $productsRender->breadcrumbs,
        ])->render();
        return response()->json($response);
    }

    public function apiSearch(Request $request)
    {
        $name = $request->has('name') ? $request->input('name') : '';
        $productsRender = new ProductsSearchRender($request, $name);
        $productsRender->initProducts();
        $response = [];
        $response['html'] = view('components.products-list', [
            'products' => $productsRender->products,
            'cartContent' => $productsRender->cartContent,
            'favoritesListContent' => $productsRender->favoritesListContent,
        ])->render();
        return response()->json($response);
    }
}
