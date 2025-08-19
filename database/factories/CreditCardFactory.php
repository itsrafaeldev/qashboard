<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registry>
 */
class CreditCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->words(3, true),
            "final_number" => $this->faker->randomElement([9999, 8888]),
            "closing_day" => $this->faker->numberBetween($min = 1, $max = 31),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 31),





        ];
    }
}
