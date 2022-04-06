<?php

namespace App\View\Components;

use App\Models\RecipeCategory;
use Illuminate\View\Component;

class AuthorSidebar extends Component
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
        $categories = RecipeCategory::all();
        return view('components.author-sidebar', compact('categories'));
    }
}
