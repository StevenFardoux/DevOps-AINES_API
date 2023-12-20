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
        Schema::table('Orders', function (Blueprint $table) {
            $table->foreign(['AddressId'], 'Orders_ibfk_1')->references(['AddressId'])->on('Address')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['CardId'], 'Orders_ibfk_2')->references(['CardId'])->on('Cards')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Orders', function (Blueprint $table) {
            $table->dropForeign('Orders_ibfk_1');
            $table->dropForeign('Orders_ibfk_2');
        });
    }
};
