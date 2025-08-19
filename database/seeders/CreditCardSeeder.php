<?php

namespace Database\Seeders;

use App\Models\CreditCard;
use Illuminate\Database\Seeder;

class CreditCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CreditCard::factory(2)->create();
    }
}
