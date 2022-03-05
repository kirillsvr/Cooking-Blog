<?php

namespace App\View\Components;

use App\Actions\NotiticationAction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class AdminNotitications extends Component
{

    private NotiticationAction $action;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(NotiticationAction $action)
    {
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-notitications', $this->action->execute());
    }
}
