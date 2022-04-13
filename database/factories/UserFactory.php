<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => 'info@mail.ru',
            'email_verified_at' => now(),
            'password' => '123456', // password
            'role_id' => 3,
            'image' => 'images/2022-02-21/AxO2fuGPHIpOyviSzKuJtz0qVw8BxYeZgEWSImsU.jpg',
            'info' => 'Привет! Добро пожаловать на мой блог! Меня зовут Юлия. Здесь я делюсь с вами рецептами, которые сама уже успела попробовать на своей кухне.',
            'public_email' => 'info@mail.ru',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
