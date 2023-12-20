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
        Schema::create('ProductCategories', function (Blueprint $table) {
            $table->integer('ProductId');
            $table->integer('CategoryId')->index('ProductCategories_ibfk_2');

            $table->primary(['ProductId', 'CategoryId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ProductCategories');
    }
};
