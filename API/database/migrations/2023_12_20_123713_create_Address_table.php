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
        Schema::create('Address', function (Blueprint $table) {
            $table->integer('AddressId', true);
            $table->string('Name', 50);
            $table->string('Firstname', 50);
            $table->string('Lastname', 50);
            $table->string('Address2', 150)->nullable();
            $table->string('City', 50);
            $table->string('Region', 50);
            $table->string('ZipCode', 10);
            $table->string('Country', 50);
            $table->string('Phone', 20);
            $table->string('Address1', 150);
            $table->integer('UserId')->index('Address_ibfk_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Address');
    }
};
