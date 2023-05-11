<?php

namespace App\View\Components;

use App\Models\SanPham;
use App\Models\TinTuc;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class trangchu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $tintuc = TinTuc::all()->take(10);
        return view('components.trangchu',compact('tintuc'));
    }
}
