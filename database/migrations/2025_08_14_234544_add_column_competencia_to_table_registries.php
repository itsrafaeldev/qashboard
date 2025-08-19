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
        //mudar nome para competence
        DB::statement('ALTER TABLE registries ADD COLUMN competence VARCHAR(7) NOT NULL');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement(query: 'ALTER TABLE registries DROP competence;');

    }
};
