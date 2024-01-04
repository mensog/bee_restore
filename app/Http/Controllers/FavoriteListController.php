<?php

namespace App\Http\Controllers;

use App\Models\ProductsFavoritesRender;
use Illuminate\Http\Request;

class FavoriteListController extends ProductsRenderController
{
    /**
     * Обработка апи-запросов к избранному
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     * @throws \Throwable
     */
    public function api(Request $request)
    {
        $possibleActions = ['add', 'remove'];
        $action = $request->input('action');
        $response = response()->json([], 404);
        if (in_array($action, $possibleActions)) {
            $productId = (int)$request->input('productId');
            $favoriteList = app('FavoriteList');

            if ($action === 'add') {
                $favoriteList->addProduct($productId);
            } else if ($action === 'remove') {
                $favoriteList->removeProduct($productId);
            }

            $response = [
                'count' => $favoriteList->countTotalQuantity(),
            ];
            if ($request->input('fromPage') === 'favorites') {
                $products = $favoriteList->getProducts();
                $cart = app('Cart');
                $inCartProductIds = $cart->getProductIds();
                $response['html'] = view('components.favorites', ['products' => $products, 'inCartProductIds' => $inCartProductIds])->render();
            }
            return response()->json($response);
        }
        return $response;
    }

    public function show(Request $request, $name = '')
    {
        $productsRender = new ProductsFavoritesRender($request, $name);
        $productsRender->initProducts();
        return view('pages.catalog', [
            'productsRender' => $productsRender,
        ]);
    }

    public function apiShow(Request $request)
    {
        $name = $request->has('name') ? $request->input('name') : '';
        $productsRender = new ProductsFavoritesRender($request, $name);
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
