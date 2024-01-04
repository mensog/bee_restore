<?php

namespace App\View\Components\Admin\Product;

use Illuminate\View\Component;

class Attribute extends Component
{
    protected $id;
    protected $name;
    protected $value;
    protected $isTemplate;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($isTemplate, $id = 0, $name = '', $value = '')
    {
        $this->isTemplate = $isTemplate;
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.product.attribute', [
            'id' => $this->id,
            'name' => $this->name,
            'value' => $this->value,
            'isTemplate' => $this->isTemplate,
        ]);
    }
}
