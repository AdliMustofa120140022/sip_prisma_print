<?php

namespace App\View\Components;

use App\Models\Katagori;
use App\Models\SubKatagori;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class userNavbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $produck;
    public $katagori;

    public function __construct()
    {
        $this->produck = SubKatagori::limit(5)->get();
        $this->katagori = Katagori::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-navbar', [
            'produck' => $this->produck,
            'katagori' => $this->katagori,
        ]);
    }
}
