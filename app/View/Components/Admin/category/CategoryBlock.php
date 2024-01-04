<?php

namespace App\View\Components\Admin\category;

use Illuminate\View\Component;

class CategoryBlock extends Component
{
    protected $categories;
    protected $id;
    protected $name;
    protected $friendlyUrl;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories, $id, $parentId, $name, $friendlyUrl)
    {
        $this->categories = $categories;
        $this->id = $id;
        $this->parentId = $parentId;
        $this->name = $name;
        $this->friendlyUrl = $friendlyUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.category.category-block', [
            'categories' => $this->categories,
            'id' => $this->id,
            'parentId' => $this->parentId,
            'name' => $this->name,
            'friendlyUrl' => $this->friendlyUrl,
            ]);
    }
}
