<?php

namespace App\Actions;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NotiticationAction
{
    public function execute()
    {
        $comments = DB::table('recipe_comments')
            ->where('is_published', 0)
            ->orderBy('created_at')
            ->limit(5)
            ->get();

        if (!empty($comments)) $comments = $this->modify($comments);

        return compact('comments');

    }

    private function modify(Collection $collection): Collection
    {
        foreach ($collection as &$comment){
            $comment->comment = Str::limit($comment->comment, 14);
            $comment->interval = Carbon::now()->diffForHumans($comment->created_at);
        }

        return $collection;
    }
}
