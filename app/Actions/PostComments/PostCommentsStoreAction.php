<?php

use App\Models\PostComments;

class PostCommentsStoreAction
{
    public function execute(array $data, string $id)
    {
        $this->create($this->modify($data, $id));
    }

    private function modify(array $data, string $id): array
    {
        $data['post_id'] = $id;

        return $data;
    }

    private function create(array $data): void
    {
        PostComments::create($data);
    }
}
