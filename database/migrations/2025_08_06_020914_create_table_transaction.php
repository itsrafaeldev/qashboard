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
        DB::statement("
            CREATE TABLE TRANSACTION (
            ID INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
            DESCRIPTION VARCHAR(30) NOT NULL,
            CREATE_AT TIMESTAMP WITHOUT TIME ZONE DEFAULT now() NOT NULL,
            UPDATE_AT TIMESTAMP WITHOUT TIME ZONE DEFAULT now() NOT NULL
            );
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TRANSACTION');
    }
};
