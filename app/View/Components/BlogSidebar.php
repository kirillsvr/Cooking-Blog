<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class BlogSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $cats = Category::with('posts')->get();
        return view('components.blog-sidebar', compact('cats'));
    }
}
