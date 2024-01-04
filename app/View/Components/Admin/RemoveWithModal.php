<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;
use Illuminate\View\View;

class RemoveWithModal extends Component
{
    /**
     * Action for delete button
     *
     * @var string
     */
    public $action;

    /**
     * Text for modal
     *
     * @var string
     */
    public $text;

    /**
     * Type of button
     *
     * @var string
     */
    public $type;

    /**
     * Create a new component instance.
     *
     * @param $action
     * @param $text
     * @param $type
     */
    public function __construct($action, $text, $type)
    {
        $this->action = $action;
        $this->text = $text;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.admin.remove-with-modal');
    }
}
