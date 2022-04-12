<?php

namespace App\Services\Comments;

class GetRelatedIdCommentsService
{
    public function generateRelatedIdsArray(string $selectedId, array $comments): array
    {
        $relatedComments[] = (int) $selectedId;
        return $this->searchRelatedId($comments, $relatedComments, $selectedId);
    }

    private function searchRelatedId(&$comments, $relatedComments, $parentId): array
    {
        foreach ($comments as $key => $comment){
            if ($comment['parent'] == $parentId){
                $relatedComments[] = $comment['id'];
                unset($comments[$key]);
                $relatedComments = $this->searchRelatedId($comments, $relatedComments, $comment['id']);
            }
        }

        return $relatedComments;
    }
}
