<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsRenderController extends Controller
{
    public function parseStoreIds($request)
    {
        if($request->has('storeId')) {
            return explode(',', $request->storeId);
        }
        return null;
    }

    public function parsePriceFrom($request)
    {
        $priceFrom = (int)$request->priceFrom * 100;
        if ($priceFrom > 0 && $priceFrom < 1e9) {
            return $priceFrom;
        }
        return null;
    }

    public function parsePriceTo($request)
    {
        $priceTo = (int)$request->priceTo * 100;
        if ($priceTo > 0 && $priceTo < 1e9) {
            return $priceTo;
        }
        return null;
    }
}
