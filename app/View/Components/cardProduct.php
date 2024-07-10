<?php

namespace App\View\Components;

use App\Models\Produck;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardProduct extends Component
{
    public $produck;
    /**
     * Create a new component instance.
     */
    public function __construct(Produck $produck)
    {
        $this->produck = $produck;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-product');
    }
}
