<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostCommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'email' => $this->faker->email,
            'comment' => $this->faker->sentence(7, true),
            'parent' => 0,
            'is_published' => 0,
            'post_id' => 0,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
