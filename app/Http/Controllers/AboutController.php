<?php

namespace App\Http\Controllers;

use App\Delivery;

class AboutController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::all();
        return view('pages.about', ['deliveries' => $deliveries]);
    }
}
