<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategoryHeaderItem extends Component
{
    protected $categories;
    protected $childCategories;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories, $childCategories)
    {
        $this->categories = $categories;
        $this->childCategories = $childCategories;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.category-header-item',[
            'categories' => $this->categories,
            'childCategories' => $this->childCategories,
        ]);
    }
}
