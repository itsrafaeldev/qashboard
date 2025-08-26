<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE REGISTRIES ADD COLUMN payment_date DATE ');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement(query: 'ALTER TABLE REGISTRIES DROP payment_date;');

    }
};
