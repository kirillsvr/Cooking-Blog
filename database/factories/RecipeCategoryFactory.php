<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'thumbnail' => $this->faker->randomElement(
                'images/2022-02-15/mB33X2rw3QpjPNn3MleyH0LB7H05ukLk0crZ9K1X.png',
                    'images/2022-02-15/j9wz5tdCJAnpYCKFk5ff6HFTw1H09wzkOUCJyk7E.png',
                    'images/2022-02-15/XcC6TyfJPXNkQVTSqiVU0f9k2iWG39tcKN21WVA6.png',
                    'images/2022-02-15/OcLYqc5XxKUa793jtRrbJPuwyLdzdmnhFNnk3aA8.png',
                    'images/2022-02-15/p7GJ3NMVTMrZCZ8wAIx9iPIIAqSrD5YUSXiOSsMe.png',
                    'images/2022-02-15/uTT0kKXaDEeZMZtN7FaoSDBviou6PSYcdgOg6Qrm.png',
                    'images/2022-02-15/b59M2cSz6vL6DQI8CwkX66zziDdyl5OhUUcOW2Q8.png',
                    'images/2022-02-15/MmgxSYMmMLwXHZBSrdsk5BOlSGenv8VQjCkXguo1.png',
            ),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
