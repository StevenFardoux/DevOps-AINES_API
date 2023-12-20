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
        Schema::create('Posseder', function (Blueprint $table) {
            $table->integer('ProductId');
            $table->integer('CartId')->index('Posseder_ibfk_2');
            $table->integer('Quantity');

            $table->primary(['ProductId', 'CartId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Posseder');
    }
};
