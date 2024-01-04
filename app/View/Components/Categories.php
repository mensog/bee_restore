<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Categories extends Component
{
    public $currentStore;
    public $storeCatalog;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($currentStore, $storeCatalog)
    {
        $this->currentStore = $currentStore;
        $this->storeCatalog = $storeCatalog;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.categories', ['storeCatalog' => $this->storeCatalog, 'currentStore' => $this->currentStore]);
    }
}
