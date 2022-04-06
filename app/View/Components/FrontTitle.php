<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FrontTitle extends Component
{
    public string $header;

    public string|null $breadcrumb;

    public $paramBreadcrumb;

    public $routeBreadcrumb;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $header,
        string|null $breadcrumb = null,
        string|null $paramBreadcrumb = null,
        string|null $routeBreadcrumb = null
    )
    {
        $this->header = $header;
        $this->breadcrumb = $breadcrumb;
        $this->paramBreadcrumb = $paramBreadcrumb;
        $this->routeBreadcrumb = $routeBreadcrumb;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front-title');
    }
}
