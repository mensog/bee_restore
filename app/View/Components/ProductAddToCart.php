<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductAddToCart extends Component
{
    /**
     * Product ID.
     *
     * @var int
     */
    public $productId;
    /**
     * Quantity of product in the cart.
     *
     * @var int
     */
    public $inCartQuantity;

    /**
     * Create a new component instance.
     *
     * @param $productId
     * @param $inCartQuantity
     */
    public function __construct($productId, $inCartQuantity)
    {
        $this->productId = $productId;
        $this->inCartQuantity = $inCartQuantity;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.product-add-to-cart');
    }
}
