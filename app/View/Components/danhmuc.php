<?php

namespace App\View\Components;

use App\Models\DanhMuc as ModelsDanhMuc;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class danhmuc extends Component
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
        $danhmuc = ModelsDanhMuc::orderByDesc('id')->get();
        return view('components.danhmuc',compact('danhmuc'));
    }
}
