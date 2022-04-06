<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4, true),
            'description' => $this->faker->text(300),
            'content' => $this->faker->paragraphs(6, true),
            'category_id' => $this->faker->numberBetween(2,3),
            'user_id' => $this->faker->numberBetween(1,6),
            'thumbnail' => 'images/2022-03-02/01.jpg',
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
