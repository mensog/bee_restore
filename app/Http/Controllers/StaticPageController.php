<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function personalDataAgreement()
    {
        $dbPageName = 'personal data agreement';
        $pageName = 'Согласие на обработку персональных данных';
        $page = StaticPage::where('name', $dbPageName)->first();
        return view('pages.static', ['page' => $page, 'pageName' => $pageName, 'dbPageName' => $dbPageName]);
    }

    public function personalDataPolicy()
    {
        $dbPageName = 'personal data policy';
        $pageName = 'Политика обработки персональных данных';
        $page = StaticPage::where('name', $dbPageName)->first();
        return view('pages.static', ['page' => $page, 'pageName' => $pageName, 'dbPageName' => $dbPageName]);
    }

    public function saleRegulations()
    {
        $dbPageName = 'sale regulations';
        $pageName = 'Правила продажи';
        $page = StaticPage::where('name', $dbPageName)->first();
        return view('pages.static', ['page' => $page, 'pageName' => $pageName, 'dbPageName' => $dbPageName]);
    }
}
