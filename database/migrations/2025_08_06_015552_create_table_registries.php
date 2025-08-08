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
            'CREATE TABLE REGISTRIES (
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
            );
        ');




    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP TABLE IF EXISTS registries;');
    }
};
