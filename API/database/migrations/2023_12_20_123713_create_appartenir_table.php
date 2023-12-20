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
        Schema::create('appartenir', function (Blueprint $table) {
            $table->integer('CartId');
            $table->integer('OrderId')->index('appartenir_ibfk_2');

            $table->primary(['CartId', 'OrderId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appartenir');
    }
};
