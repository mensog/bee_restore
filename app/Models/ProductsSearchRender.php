<?php

namespace App;


class ProductsSearchRender extends ProductsRender
{
    public function __construct($request, $categoryName)
    {
        parent::__construct($request, $categoryName);
        $this->parseSearchString($request);
        $this->pageName = 'Поиск';
        $this->pageRootRoute = route('search');
        $this->sidebarRouteName = 'search';
    }


    protected function parseSearchString($request)
    {
        if ($request->has('q') && $request->q != '') {
            $this->productsQuery->where('name', 'like', '%' . $request->q . '%');
        } else {
            $this->skipQuery = true;
        }
    }
}
