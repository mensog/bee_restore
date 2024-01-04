<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    public function index()
    {
        return view('pages.promotions');
    }
}
