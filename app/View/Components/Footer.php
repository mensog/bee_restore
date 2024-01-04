<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * is password changed.
     *
     * @var bool
     */
    public $passwordChanged;

    /**
     * Create a new component instance.
     *
     * @param $passwordChanged
     */
    public function __construct($passwordChanged = false)
    {
        $this->passwordChanged = $passwordChanged;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.footer');
    }
}
