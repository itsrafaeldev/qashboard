<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE TABLE CATEGORIES (
            ID INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
            CATEGORY_NAME VARCHAR(50) NOT NULL,
            DESCRIPTION VARCHAR(255) NOT NULL,
            CREATED_AT TIMESTAMP WITHOUT TIME ZONE DEFAULT now() NOT NULL,
            UPDATED_AT TIMESTAMP WITHOUT TIME ZONE DEFAULT now() NOT NULL
            );
        ");


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement(
            'DROP TABLE IF EXISTS categories;'
        );
    }
};
