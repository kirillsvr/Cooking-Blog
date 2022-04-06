<?php

namespace App\Listeners;

use App\Events\RecipeHasViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RecipeCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\RecipeHasViewed  $event
     * @return void
     */
    public function handle(RecipeHasViewed $event)
    {
        if ($this->sessionAddId($event->recipe->id))
            $event->recipe->increment('views');
    }

    private function sessionAddId(string $id): bool
    {
        if (session()->has('recipeViewed') && array_search($id, session('recipeViewed')) !== false) return false;

        session()->push('recipeViewed', $id);
        return true;
    }
}
