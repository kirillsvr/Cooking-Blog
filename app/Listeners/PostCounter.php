<?php

namespace App\Listeners;

use App\Events\PostHasViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostCounter
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
     * @param  \App\Events\PostHasViewed  $event
     * @return void
     */
    public function handle(PostHasViewed $event)
    {
        if ($this->sessionAddId($event->post->id))
            $event->post->increment('views');
    }

    private function sessionAddId(string $id): bool
    {
        if (session()->has('postViewed') && array_search($id, session('postViewed')) !== false) return false;

        session()->push('postViewed', $id);
        return true;
    }
}
