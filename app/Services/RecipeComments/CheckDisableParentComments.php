<?php

namespace App\Services\RecipeComments;

class CheckDisableParentComments
{
    public function executeCheck(array $comments, string $commentId): bool
    {
        $parent = 0;

        foreach ($comments as $key => $comment){
            if ($comment['id'] == $commentId) {
                if ($comment['parent'] == 0) return true;

                $parent = $comment['parent'];
                unset($comments[$key]);
                break;
            }
        }

        return $this->checkParent($comments, $parent);
    }

    private function checkParent($comments, $commentId): bool
    {
        foreach ($comments as $comment){
            if ($comment['id'] == $commentId){
                if ($comment['is_published'] == 0) return false;

                if ($comment['parent'] != 0) return $this->checkParent($comments, $comment['parent']);

                return true;
            }
        }
    }
}
