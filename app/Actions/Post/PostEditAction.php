<?php

namespace App\Actions\Post;

use App\Actions\AbstractPostAction;
use App\Models\Post;

class PostEditAction extends AbstractPostAction
{
    public function execute(Post $post)
    {
        $categories = $this->getCategories();
        $tags = $this->getTags();

        return compact(
            'post',
            'categories',
            'tags'
        );
    }
}
