<?php

namespace App\View\Components;

use App\Product;
use Illuminate\View\Component;


class Liked extends Component
{
     /**
     * Array of favorites.
     *
     * @var array
     */
    public $favoritesListContent;


    public $likedRandomProducts;

    /**
     * Create a new component instance.
     *
     * @param $favoritesListContent
     * @param $likedRandomProducts
     */
    public function __construct($favoritesListContent, $likedRandomProducts)
    {
        $this->favoritesListContent = $favoritesListContent;
        $this->likedRandomProducts = $likedRandomProducts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.liked');
    }
}
