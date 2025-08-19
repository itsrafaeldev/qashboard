<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registry>
 */
class RegistryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            /*
             ID INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
            REGISTRY_NAME VARCHAR(255) NOT NULL,
            CATEGORY_ID INTEGER NOT NULL,
            TRANSACTION_ID INTEGER NOT NULL,
            STATUS BOOLEAN NOT NULL,
            REGISTRY_DATE TIMESTAMP NOT NULL,
            AMOUNT NUMERIC(10, 2) NOT NULL,
            QUANTITY_INSTALLMENT INTEGER NOT NULL,
            CURRENT_INSTALLMENT INTEGER NOT NULL,
            VALUE_INSTALLMENT NUMERIC(10, 2) GENERATED ALWAYS AS (AMOUNT / NULLIF(QUANTITY_INSTALLMENT, 0)) STORED,
            CREATED_AT TIMESTAMP WITHOUT TIME ZONE DEFAULT now() NOT NULL,
            UPDATED_AT TIMESTAMP WITHOUT TIME ZONE DEFAULT now() NOT NULL

            'registry_name', 'status', 'registry_date', 'amount', 'quantity_installment', 'current_installment'
             */

            "registry_name" => $this->faker->words(3, true),
            "status" => $this->faker->boolean(),
            "registry_date" => $this->faker->date(),
            "amount" => $this->faker->randomFloat(2, 100.00, 99999.99),
            "quantity_installment" => $this->faker->numberBetween($min = 1, $max = 12),
            "current_installment" => $this->faker->numberBetween($min = 1, $max = 12),
            "description" => $this->faker->text(),
            "category_id" => $this->faker->numberBetween($min = 1, $max = 5),
            "transaction_id" => $this->faker->numberBetween($min = 1, $max = 2)



        ];
    }
}
