<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategorySidebar extends Component
{
    protected $categories;
    protected $store;
    protected $activeCategorySlugs;
    protected $routeName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories, $activeCategorySlugs, $routeName)
    {
        $this->categories = $categories;
        $this->activeCategorySlugs = $activeCategorySlugs;
        $this->routeName = $routeName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.category-sidebar', [
            'categories' => $this->categories,
            'activeCategorySlugs' => $this->activeCategorySlugs,
            'routeName' => $this->routeName,
        ]);
    }
}
