<?php

namespace Database\Seeders;

use App\Models\PostComments;
use Illuminate\Database\Seeder;

class PostCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostComments::factory(5)->create();
    }
}
