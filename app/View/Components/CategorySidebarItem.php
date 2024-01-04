<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategorySidebarItem extends Component
{
    protected $categories;
    protected $childCategories;
    protected $activeCategorySlugs;
    protected $routeName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories, $childCategories, $activeCategorySlugs, $routeName)
    {
        $this->categories = $categories;
        $this->childCategories = $childCategories;
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
        return view('components.category-sidebar-item', [
            'categories' => $this->categories,
            'childCategories' => $this->childCategories,
            'activeCategorySlugs' => $this->activeCategorySlugs,
            'routeName' => $this->routeName,
        ]);
    }
}
