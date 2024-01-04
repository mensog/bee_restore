<?php

namespace App\View\Components;

use Illuminate\View\Component;

class favorites extends Component
{
    /**
     * Array of products.
     *
     * @var array
     */
    public $products;
    /**
     * Array of products in cart.
     *
     * @var array
     */
    public $inCartProductIds;

    /**
     * Create a new component instance.
     *
     * @param $products
     * @param $inCartProductIds
     */
    public function __construct($products, $inCartProductIds)
    {
        $this->products = $products;
        $this->inCartProductIds = $inCartProductIds;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.favorites');
    }
}
