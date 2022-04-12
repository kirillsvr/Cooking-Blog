<?php

namespace App\Actions;

use App\Exceptions\CheckParentCommentException;
use App\Services\Comments\CheckDisableParentComments;

abstract class AbstractCommentsEnableAction
{
    protected CheckDisableParentComments $checkParents;

    public function __construct(CheckDisableParentComments $checkParents)
    {
        $this->checkParents = $checkParents;
    }

    abstract public function execute(string $commentId, string $elementId): void;

    protected function checkParentPublish(array $comments, string $commentId)
    {
        if (!$this->checkParents->executeCheck($comments, $commentId))
            throw new CheckParentCommentException('Нельзя опубликовать комментарий если его родители не опубликованы');
    }
}
