<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class CartAside extends Component
{
    /**
     * Cart total value.
     *
     * @var array
     */
    public $cartTotal;

    /**
     * Array of quantity.
     *
     * @var array
     */
    public $quantity;

    /**
     * Delivery id.
     *
     * @var int
     */
    public $delivery;

    public $hasNoOrders;
    public $privateAccount;
    public $bonusDiscount;
    public $promocode;
    public $promocodeDiscount;
    public $wrongPromocode;
    public $totalWeight;

    /**
     * Create a new component instance.
     *
     * @param $cartTotal
     * @param $quantity
     * @param $deliveryId
     */
    public function __construct($cartTotal, $quantity, $privateAccount, $delivery = false, $hasNoOrders = false, $bonusDiscount = 0, $promocode = false, $promocodeDiscount = 0, $wrongPromocode = false, $totalWeight = 0)
    {
        $this->cartTotal = $cartTotal;
        $this->quantity = $quantity;
        $this->delivery = $delivery;
        $this->hasNoOrders = $hasNoOrders;
        $this->privateAccount = $privateAccount;
        $this->bonusDiscount = $bonusDiscount;
        $this->promocode = $promocode;
        $this->promocodeDiscount = $promocodeDiscount;
        $this->wrongPromocode = $wrongPromocode;
        $this->totalWeight = $totalWeight;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.cart-aside');
    }
}
