<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //CATEGORY_NAME VARCHAR(50) NOT NULL,
            //DESCRIPTION VARCHAR(30) NOT NULL,
            "category_name" => $this->faker->colorName,
            "description" => $this->faker->sentence
        ];
    }
}
