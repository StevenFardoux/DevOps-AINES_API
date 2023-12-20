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
        Schema::table('ProductMaterial', function (Blueprint $table) {
            $table->foreign(['ProductId'], 'ProductMaterial_ibfk_1')->references(['ProductId'])->on('Products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['MaterialId'], 'ProductMaterial_ibfk_2')->references(['MaterialId'])->on('Materials')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ProductMaterial', function (Blueprint $table) {
            $table->dropForeign('ProductMaterial_ibfk_1');
            $table->dropForeign('ProductMaterial_ibfk_2');
        });
    }
};
