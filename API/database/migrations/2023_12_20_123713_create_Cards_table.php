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
        Schema::create('Cards', function (Blueprint $table) {
            $table->integer('CardId', true);
            $table->string('Name', 100);
            $table->string('CardNumber', 16);
            $table->integer('CVV')->nullable();
            $table->date('ExpirationDate')->nullable();
            $table->integer('UserId')->index('Cards_ibfk_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cards');
    }
};
