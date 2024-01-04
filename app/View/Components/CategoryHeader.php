<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategoryHeader extends Component
{
    protected $categories;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.category-header', ['categories' => $this->categories]);
    }
}
