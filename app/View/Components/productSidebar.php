<?php

namespace App\View\Components;

use App\Models\Katagori;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class productSidebar extends Component
{

    public $katagoris;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
        $this->katagoris = Katagori::all()->sortBy('id');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-sidebar');
    }
}
