<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
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
            'prep_time' => 100,
            'cook_time' => 100,
            'skill_level' => $this->faker->numberBetween(1,3),
            'content' => $this->faker->paragraphs(6, true),
            'recipe_categories_id' => $this->faker->numberBetween(1,6),
            'user_id' => 1,
            'caloric' => 100,
            'protein' => 100,
            'fat' => 100,
            'carbohydrates' => 100,
            'thumbnail' => 'images/2022-03-02/0' . $this->faker->numberBetween(1,6) . '.jpg',
            'views' => 0,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
