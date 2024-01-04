<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    public $pageRootRoute;
    public $pageRootName;
    public $breadcrumbs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pageRootRoute, $pageRootName, $breadcrumbs)
    {
        $this->pageRootRoute = $pageRootRoute;
        $this->pageRootName = $pageRootName;
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.breadcrumbs');
    }
}
