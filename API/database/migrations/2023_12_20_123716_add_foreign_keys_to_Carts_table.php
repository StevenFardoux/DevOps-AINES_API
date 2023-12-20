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
        Schema::table('Carts', function (Blueprint $table) {
            $table->foreign(['UserId'], 'Carts_ibfk_1')->references(['UserId'])->on('Users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Carts', function (Blueprint $table) {
            $table->dropForeign('Carts_ibfk_1');
        });
    }
};
