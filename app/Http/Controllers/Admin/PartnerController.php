<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $partners = Partner::all();
        return view('pages.admin.partners', ['partners' => $partners]);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $partner = Partner::with('products')->where('id', $id)->firstOrFail();
        return view('pages.admin.partner', ['partner' => $partner]);
    }
}
