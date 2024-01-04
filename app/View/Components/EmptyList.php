<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EmptyList extends Component
{

    /**
     * Page for empty-list
     *
     * @var string
     */
    public $page;

    /**
     * Create a new component instance.
     *
     * @param $page
     */
    public function __construct($page = null)
    {
        $this->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.empty-list');
    }
}
