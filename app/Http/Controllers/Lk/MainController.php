<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Личный счет';
        return view('lk.dashboard', ['title' => $title]);
    }

    public function orders(Request $request)
    {
        $orders = Auth::user()->orders()->with('items', 'items.product')->orderBy('created_at', 'desc')->paginate(10);
        $favoritesList = app('FavoriteList');
        $favoritesListContent = $favoritesList->content;
        $groupedOrders = [];
        $storeIds = [];
        foreach ($orders as $order) {
            $groupedOrder = $order->items->groupBy('product.store.id');
            $groupedOrders[] = $order->items->groupBy('product.store.id');
            $storeIds = array_merge($storeIds, array_keys($groupedOrder->toArray()));
        }
        $storeIds = array_unique($storeIds);
        $stores = Partner::whereIn('id', $storeIds)->get()->keyBy('id');
        if ($request->session()->has('createdOrderId')) {
            $createdOrderId = session('createdOrderId');
        } else {
            $createdOrderId = false;
        }
        $title = 'Заказы';
        return view('lk.orders', [
            'orders' => $orders,
            'createdOrderId' => $createdOrderId,
            'favoritesListContent' => $favoritesListContent,
            'groupedOrders' => $groupedOrders,
            'stores' => $stores,
            'title' => $title,
            ]);
    }
}
