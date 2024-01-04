<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Cart extends Component
{
    /**
     * Array of favorites.
     *
     * @var array
     */
    public $favoriteList;
    /**
     * Grouped cart content.
     *
     * @var array
     */
    public $groupedCartContent;
    /**
     * Array of stores.
     *
     * @var array
     */
    public $stores;
    /**
     * Array of quantity.
     *
     * @var array
     */
    public $quantity;
    /**
     * Array of subtotals.
     *
     * @var array
     */
    public $itemsSubTotal;

    /**
     * Array of subtotals.
     *
     * @var int
     */
    public $cartTotal;

    public $favoritesListContent;

    public $totalWeight;

    /**
     * Create a new cart component instance.
     *
     * @param $favoriteList
     * @param $groupedCartContent
     * @param $stores
     * @param $quantity
     * @param $itemsSubTotal
     * @param $cartTotal
     */
    public function __construct($favoriteList, $groupedCartContent, $stores, $quantity, $itemsSubTotal, $cartTotal, $favoritesListContent, $totalWeight)
    {
        $this->groupedCartContent = $groupedCartContent;
        $this->favoriteList = $favoriteList;
        $this->stores = $stores;
        $this->quantity = $quantity;
        $this->itemsSubTotal = $itemsSubTotal;
        $this->cartTotal = $cartTotal;
        $this->favoritesListContent = $favoritesListContent;
        $this->totalWeight = $totalWeight;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.cart');
    }
}
