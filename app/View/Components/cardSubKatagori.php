<?php

namespace App\View\Components;

use App\Models\SubKatagori;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardSubKatagori extends Component
{
    public $subKatagori;
    /**
     * Create a new component instance.
     */
    public function __construct(SubKatagori $subKatagori)
    {
        //
        $this->subKatagori = $subKatagori;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-sub-katagori');
    }
}
