<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProductMaterial', function (Blueprint $table) {
            $table->integer('ProductId');
            $table->integer('MaterialId')->index('ProductMaterial_ibfk_2');

            $table->primary(['ProductId', 'MaterialId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ProductMaterial');
    }
};
