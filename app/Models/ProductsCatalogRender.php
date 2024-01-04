<?php

namespace App;


class ProductsCatalogRender extends ProductsRender
{
    public function __construct($request, $categoryName)
    {
        parent::__construct($request, $categoryName);

        $this->pageName = 'Каталог';
        $this->pageRootRoute = route('catalog');
        $this->sidebarRouteName = 'category';
    }
}
