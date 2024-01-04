<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductsList extends Component
{
    public $products;

    public $cartContent;

    public $favoritesListContent;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($products, $cartContent, $favoritesListContent)
    {
        $this->products = $products;
        $this->cartContent = $cartContent;
        $this->favoritesListContent = $favoritesListContent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.products-list', [
            'products' => $this->products,
            'cartContent' => $this->cartContent,
            'favoritesListContent' => $this->favoritesListContent,
        ]);
    }
}
