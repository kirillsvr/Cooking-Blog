<?php

namespace App\Services\RecipeComments;


class CommentsService
{
    public function modify(array $comments): array
    {
        return $this->createTree($comments);
    }

    private function createTree($comments): array
    {
        $newArrayComments = [];

        foreach ($comments as $key => $value){
            if ($value['parent'] === 0){
                $newArrayComments[] = $value;
                unset($comments[$key]);
            }
        }

        if (!empty($comments)){
            $newArrayComments = $this->createChilds($comments, $newArrayComments);
        }

        return $newArrayComments;
    }

    private function createChilds(&$comments, array $newArrayComments): array
    {
        foreach ($newArrayComments as $k => $v){
            foreach ($comments as $key => $value){
                if ($value['parent'] === $v['id']){
                    $newArrayComments[$k]['childs'][] = $value;
                    unset($comments[$key]);
                }
            }

            if (!empty($newArrayComments[$k]['childs'])){
                $newArrayComments[$k]['childs'] = $this->createChilds($comments, $newArrayComments[$k]['childs']);
            }
        }

        return $newArrayComments;
    }
}
