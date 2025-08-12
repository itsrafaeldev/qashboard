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


        DB::statement('ALTER TABLE INSTALLMENTS ADD COLUMN registry_id INTEGER NOT NULL');

        DB::statement('ALTER TABLE INSTALLMENTS
            ADD CONSTRAINT fk_intallments
            FOREIGN KEY (registry_id) REFERENCES REGISTRIES(id)
            ON DELETE CASCADE;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE INSTALLMENTS DROP CONSTRAINT fk_intallments;');
        DB::statement('ALTER TABLE INSTALLMENTS DROP registry_id;');

    }
};
