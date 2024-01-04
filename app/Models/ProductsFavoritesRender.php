<?php

namespace App;


class ProductsFavoritesRender extends ProductsRender
{
    public function __construct($request, $categoryName)
    {
        parent::__construct($request, $categoryName);
        $this->filterByProductIdsInFavorites();

        $this->pageName = 'Избранное';
        $this->pageRootRoute = route('favorites');
        $this->sidebarRouteName = 'favorites_category';
    }

    protected function filterByProductIdsInFavorites()
    {
        $this->productsQuery->whereIn('id', $this->favoritesListContent);
    }
}
