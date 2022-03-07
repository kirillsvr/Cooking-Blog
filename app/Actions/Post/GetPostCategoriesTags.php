<?php

namespace App\Actions\Post;

use App\Actions\AbstractPostAction;

class GetPostCategoriesTags extends AbstractPostAction
{
    public function execute()
    {
        $categories = $this->getCategories();
        $tags = $this->getTags();

        return compact('categories', 'tags');
    }
}
