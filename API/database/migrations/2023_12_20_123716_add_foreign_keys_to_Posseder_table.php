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
        Schema::table('Posseder', function (Blueprint $table) {
            $table->foreign(['ProductId'], 'Posseder_ibfk_1')->references(['ProductId'])->on('Products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['CartId'], 'Posseder_ibfk_2')->references(['CartId'])->on('Carts')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Posseder', function (Blueprint $table) {
            $table->dropForeign('Posseder_ibfk_1');
            $table->dropForeign('Posseder_ibfk_2');
        });
    }
};
