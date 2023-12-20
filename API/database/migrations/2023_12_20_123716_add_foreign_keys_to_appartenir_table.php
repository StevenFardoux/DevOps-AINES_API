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
        Schema::table('appartenir', function (Blueprint $table) {
            $table->foreign(['CartId'], 'appartenir_ibfk_1')->references(['CartId'])->on('Carts')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['OrderId'], 'appartenir_ibfk_2')->references(['OrderId'])->on('Orders')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appartenir', function (Blueprint $table) {
            $table->dropForeign('appartenir_ibfk_1');
            $table->dropForeign('appartenir_ibfk_2');
        });
    }
};
