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
        DB::statement(
            'CREATE TABLE CREDIT_CARDS (
            ID INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
            NAME VARCHAR(60) NOT NULL,
            FINAL_NUMBER INTEGER NOT NULL DEFAULT 0,
            CLOSING_DAY INTEGER NOT NULL,
            USER_ID INTEGER NOT NULL,
            CREATED_AT TIMESTAMP WITHOUT TIME ZONE DEFAULT now() NOT NULL,
            UPDATED_AT TIMESTAMP WITHOUT TIME ZONE DEFAULT now() NOT NULL
            );'
        );


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP TABLE CREDIT_CARDS;');

    }
};
