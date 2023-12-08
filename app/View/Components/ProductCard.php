<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{
    public $thumbnail;
    public $name;
    public $price;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($thumbnail, $name, $price)
    {
        $this->thumbnail = $thumbnail;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-card');
    }
}
