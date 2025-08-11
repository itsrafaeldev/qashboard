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

        //MUDAR O CODIGO A DATA E CODIGO DA MIGRATION QUANDO FOR ADICIONAR AS FKS NOVAMENTE

        // DB::statement(
        //     'ALTER TABLE REGISTRIES
        //     ADD CONSTRAINT fk_categories
        //     FOREIGN KEY (category_id) REFERENCES REGISTRIES(id)
        //     ON DELETE CASCADE;
        //     ');

        // DB::statement(
        //     "ALTER TABLE REGISTRIES
        //     ADD CONSTRAINT fk_transaction
        //     FOREIGN KEY (transaction_id) REFERENCES REGISTRIES(id)
        //     ON DELETE CASCADE;
        // ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    //   DB::statement('ALTER TABLE REGISTRIES DROP CONSTRAINT fk_transaction;');
    //   DB::statement('ALTER TABLE REGISTRIES DROP CONSTRAINT fk_categories;');


    }
};
