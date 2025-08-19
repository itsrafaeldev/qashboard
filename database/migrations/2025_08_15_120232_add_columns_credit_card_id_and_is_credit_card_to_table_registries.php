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
        DB::statement('ALTER TABLE registries ADD COLUMN credit_card_id integer');
        DB::statement('ALTER TABLE registries ADD COLUMN is_credit_card boolean default false');

        DB::statement(
            'ALTER TABLE REGISTRIES
            ADD CONSTRAINT fk_credit_card
            FOREIGN KEY (credit_card_id) REFERENCES registries(id)
            ON DELETE CASCADE;
            '
        );

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE REGISTRIES DROP CONSTRAINT fk_credit_card;');
        DB::statement('ALTER TABLE REGISTRIES DROP is_credit_card;');
        DB::statement('ALTER TABLE REGISTRIES DROP credit_card_id;');



    }
};
