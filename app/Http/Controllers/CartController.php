<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Promocode;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Добавление товара в корзину
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function addProduct(Request $request)
    {
        $productId = (int)$request->input('productId');
        $quantity = (int)$request->input('quantity');
        $cart = app('Cart');
        $cart->addProduct($productId, $quantity);
        $cartContent = $cart->content;
        $totalWeight = $cart->getTotalWeight();
        $response = [
            'count' => $cart->countTotalQuantity(),
            'cartTotal' => number_format($cart->getTotal() / 100, 0, ',', ' ') . ' ₽',
            'totalWeight' => $totalWeight,
        ];
        if ($request->input('fromPage') === 'cart') {
            $products = $cart->getProducts();
            $groupedCartContent = $products->groupBy('store_id');
            $stores = Partner::whereIn('id', array_keys($groupedCartContent->toArray()))->get()->keyBy('id');
            $itemsSubTotal = $cart->getItemsSubTotal();
            $cartTotal = $cart->getTotal();
            $favoritesList = app('FavoriteList');
            $favoritesListContent = $favoritesList->content;
            $response['html'] = view('components.cart', [
                'products' => $products,
                'quantity' => $cartContent,
                'itemsSubTotal' => $itemsSubTotal,
                'cartTotal' => $cartTotal,
                'groupedCartContent' => $groupedCartContent,
                'stores' => $stores,
                'favoriteList' => $favoritesListContent,
                'totalWeight' => $totalWeight,
            ])->render();
        } elseif ($request->input('fromPage') === 'product') {
            $response['html'] = view('components.product-add-to-cart', ['productId' => $productId, 'inCartQuantity' => $quantity, 'totalWeight' => $totalWeight,])->render();
        }
        return response()->json($response);
    }

    /**
     * Вывод корзины товаров
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        $cart = app('Cart');
        $cartContent = $cart->content;
        $products = $cart->getProducts();
        $itemsSubTotal = $cart->getItemsSubTotal();
        $cartTotal = $cart->getTotal();
        $groupedCartContent = $products->groupBy('store_id');
        $favoritesList = app('FavoriteList');
        $favoritesListContent = $favoritesList->content;
        $recommendedProducts = Product::inRandomOrder()->whereNotIn('id', $cart->getProductIds())->limit(4)->get();
        $stores = Partner::whereIn('id', array_keys($groupedCartContent->toArray()))->get()->keyBy('id');
        $totalWeight = $cart->getTotalWeight();
        return view('pages.cart', [
            'products' => $products,
            'quantity' => $cartContent,
            'itemsSubTotal' => $itemsSubTotal,
            'cartTotal' => $cartTotal,
            'groupedCartContent' => $groupedCartContent,
            'stores' => $stores,
            'favoriteList' => $favoritesListContent,
            'recommendedProducts' => $recommendedProducts,
            'totalWeight' => $totalWeight,
        ]);
    }

    /**
     * Изменение количество товара в корзине
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function updateProductQuantity(Request $request)
    {
        $productId = (int)$request->input('productId');
        $quantity = (int)$request->input('quantity');
        $cart = app('Cart');
        $cart->updateProductQuantity($productId, $quantity);
        $cartContent = $cart->content;
        $totalWeight = $cart->getTotalWeight();
        $response = [
            'count' => $cart->countTotalQuantity(),
            'cartTotal' => number_format($cart->getTotal() / 100, 0, ',', ' ') . ' ₽',
            'totalWeight' => $totalWeight,
        ];
        if ($request->input('fromPage') === 'cart') {
            $products = $cart->getProducts();
            $itemsSubTotal = $cart->getItemsSubTotal();
            $cartTotal = $cart->getTotal();
            $groupedCartContent = $products->groupBy('store_id');
            $stores = Partner::whereIn('id', array_keys($groupedCartContent->toArray()))->get()->keyBy('id');
            $favoritesList = app('FavoriteList');
            $favoritesListContent = $favoritesList->content;
            $response['html'] = view('components.cart', [
                'products' => $products,
                'quantity' => $cartContent,
                'itemsSubTotal' => $itemsSubTotal,
                'cartTotal' => $cartTotal,
                'groupedCartContent' => $groupedCartContent,
                'stores' => $stores,
                'favoriteList' => $favoritesListContent,
                'totalWeight' => $totalWeight,
            ])->render();
        } elseif ($request->input('fromPage') === 'product') {
            $response['html'] = view('components.product-add-to-cart', ['productId' => $productId, 'inCartQuantity' => $quantity, 'totalWeight' => $totalWeight,])->render();
        } elseif ($request->input('fromPage') === 'favorites') {
            $inCartProducts = $cart->getProducts();
            $favoritesList = app('FavoriteList');
            $favoriteProducts = $favoritesList->getProducts();
            $response['html'] = view('components.favorites', ['products' => $favoriteProducts, 'inCartProducts' => $inCartProducts, 'totalWeight' => $totalWeight,])->render();
        }
        return response()->json($response);

    }

    /**
     * Обработка апи-запросов к корзине
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     * @throws \Throwable
     */
    public function api(Request $request)
    {
        $possibleActions = ['add', 'updateQuantity'];
        $action = $request->input('action');
        $response = response()->json([], 404);
        if (in_array($action, $possibleActions)) {
            if ($action === 'add') {
                $response = $this->addProduct($request);
            }
            if ($action === 'updateQuantity') {
                $response = $this->updateProductQuantity($request);
            }
        }
        return $response;
    }

    public function apiAside(Request $request)
    {
        $response = response()->json([], 404);
        if ($request->has('deliveryId')) {
            $delivery = Delivery::find($request->input('deliveryId'));
            if ($delivery) {
                $cart = app('Cart');
                $cartContent = $cart->content;
                $cartTotal = $cart->getTotal();
                $totalWeight = $cart->getTotalWeight();
                $response = [];
                $user = auth()->user();
                $privateAccount = $user->privateAccount;
                $bonusDiscount = (int) $cart->bonus_discount;
                if ($request->has('bonusAmount')) {
                    $bonusesToAdd = (int) $request->input('bonusAmount') * 100;
                    if ($bonusesToAdd == 0) {
                        $cart->bonus_discount = 0;
                        $bonusDiscount = 0;
                    }elseif ($bonusesToAdd <= $privateAccount->getTotalAmount()) {
                        $cart->bonus_discount = $bonusesToAdd;
                        $bonusDiscount = $bonusesToAdd;
                    }
                    $cart->save();
                }
                if ($bonusDiscount > $cartTotal) {
                    $bonusDiscount = $cartTotal;
                    $cart->bonus_discount = $cartTotal;
                    $cart->save();
                }
                $wrongPromocode = false;
                $promocode = false;
                $promocodeDiscount = 0;
                if ($request->has('promocode')) {
                    $promocode = Promocode::where('name', $request->input('promocode'))->first();
                    if ($promocode) {
                        $promocodeDiscount = $promocode->getCurrencyAmountFromTotal($cartTotal);
                        if ($promocodeDiscount > $cartTotal - $bonusDiscount) {
                            $promocodeDiscount = $cartTotal - $bonusDiscount;
                        }
                        $cart->promocode = $promocode->name;
                        $cart->save();
                    } else {
                        $wrongPromocode = $request->input('promocode');
                        $promocode = false;
                    }
                }
                if ($request->has('removePromocode')) {
                    $cart->promocode = null;
                    $promocode = false;
                    $cart->save();
                }
                if (!$promocode) {
                    $promocode = Promocode::where('name', $cart->promocode)->first();
                    if ($promocode) {
                        $promocodeDiscount = $promocode->getCurrencyAmountFromTotal($cartTotal);
                        if ($promocodeDiscount > $cartTotal - $bonusDiscount) {
                            $promocodeDiscount = $cartTotal - $bonusDiscount;
                        }
                    } else {
                        $promocode = false;
                    }
                }
                if ($promocodeDiscount > $cartTotal - $bonusDiscount) {
                    $promocodeDiscount = $cartTotal - $bonusDiscount;
                }
                $hasNoOrders = $user->orders->count() == 0;
                $response['html'] = view('components.cart-aside', [
                    'cartTotal'=> $cartTotal,
                    'quantity' => $cartContent,
                    'delivery' => $delivery,
                    'totalWeight' => $totalWeight,
                    'hasNoOrders' => $hasNoOrders,
                    'privateAccount' => $privateAccount,
                    'bonusDiscount' => $bonusDiscount,
                    'promocode' => $promocode,
                    'promocodeDiscount' => $promocodeDiscount,
                    'wrongPromocode' => $wrongPromocode,
                ])->render();
            }
        }
        return $response;
    }

    public function showCheckout(Request $request)
    {
        $cart = app('Cart');
        $cartContent = $cart->content;
        $bonusDiscount = (int) $cart->bonus_discount;
        $products = $cart->getProducts();
        $itemsSubTotal = $cart->getItemsSubTotal();
        $cartTotal = $cart->getTotal();
        if ($bonusDiscount > $cartTotal) {
            $bonusDiscount = $cartTotal;
            $cart->bonus_discount = $cartTotal;
            $cart->save();
        }
        $user = auth()->user();
        $hasNoOrders = $user->orders->count() == 0;
        $deliveries = Delivery::all();
        $totalWeight = $cart->getTotalWeight();
        if (Order::WEIGHT_MAX_LIMIT < $totalWeight || Order::WEIGHT_MIN_LIMIT > $totalWeight) {
            return redirect()->route('cart');
        }
        $privateAccount = $user->privateAccount;
        $promocodeDiscount = 0;
        if ($cart->promocode) {
            $promocode = Promocode::where('name', $cart->promocode)->first();
            if ($promocode) {
                $promocodeDiscount = $promocode->getCurrencyAmountFromTotal($cartTotal);
                if ($promocodeDiscount > $cartTotal - $bonusDiscount) {
                    $promocodeDiscount = $cartTotal - $bonusDiscount;
                }
            } else {
                $promocode = false;
            }
        } else {
            $promocode = false;
        }
        return view('pages.checkout', ['products' => $products,
            'quantity' => $cartContent,
            'itemsSubTotal' => $itemsSubTotal,
            'cartTotal' => $cartTotal,
            'user' => $user,
            'deliveries' => $deliveries,
            'totalWeight' => $totalWeight,
            'hasNoOrders' => $hasNoOrders,
            'privateAccount' => $privateAccount,
            'bonusDiscount' => $bonusDiscount,
            'promocode' => $promocode,
            'promocodeDiscount' => $promocodeDiscount,
            'wrongPromocode' => false,
        ]);
    }
}
