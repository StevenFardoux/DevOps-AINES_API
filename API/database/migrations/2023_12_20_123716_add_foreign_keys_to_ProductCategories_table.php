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
        Schema::table('ProductCategories', function (Blueprint $table) {
            $table->foreign(['ProductId'], 'ProductCategories_ibfk_1')->references(['ProductId'])->on('Products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['CategoryId'], 'ProductCategories_ibfk_2')->references(['CategoryId'])->on('Categories')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ProductCategories', function (Blueprint $table) {
            $table->dropForeign('ProductCategories_ibfk_1');
            $table->dropForeign('ProductCategories_ibfk_2');
        });
    }
};
