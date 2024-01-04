<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StarRating extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    protected $rating;
    protected $class;
    protected $interaction;

    public function __construct($rating, $class, $interaction = true)
    {
        $this->rating = $rating;
        $this->class = $class;
        $this->interaction = $interaction;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.star-rating', ['rating' => $this->rating, 'class' => $this->class, 'interaction' => $this->interaction]);
    }
}
