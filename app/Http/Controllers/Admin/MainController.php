<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = Product::
            select(DB::raw('count(*) as num, store_id'))->getValue(DB::connection()->getQueryGrammar())
            ->groupBy('store_id')
            ->pluck('num', 'store_id');
        $total = 0;
        foreach ($products as $product) {
            $total += $product;
        }
        return view('pages.admin.main', ['products' => $products, 'total' => $total]);

    }
}
