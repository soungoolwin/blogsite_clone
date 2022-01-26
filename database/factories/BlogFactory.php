<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->title(),
            'user_id'=>User::factory(),
            'category_id'=>Category::factory(),
            'slug'=>$this->faker->unique()->slug(),
            'intro'=>$this->faker->sentence(),
            'body'=>$this->faker->paragraph(),
        ];
    }
}
