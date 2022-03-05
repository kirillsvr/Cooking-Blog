<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminSubtitles extends Component
{
    public $headtitle;
    public $subtitle;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($headtitle, $subtitle)
    {
        $this->headtitle = $headtitle;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-subtitles');
    }
}
