<?php

namespace App\View\Components\Admin\Order;

use Illuminate\View\Component;

class CourierData extends Component
{
    protected $fullName;
    protected $phone;
    protected $carSize;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fullName, $phone, $carSize)
    {
        $this->fullName = $fullName;
        $this->phone = $phone;
        $this->carSize = $carSize;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.order.courier-data', ['fullName' => $this->fullName, 'phone' => $this->phone,'carSize' => $this->carSize]);
    }
}
