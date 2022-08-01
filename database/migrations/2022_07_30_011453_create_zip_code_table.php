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
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->id();
            $table->string('zip_code');
            $table->string('locality')->nullable();

            $table->integer('federal_key');
            $table->string('federal_name');
            $table->string('federal_code')->nullable();
            
            $table->integer('settlements_key');
            $table->string('settlements_name');
            $table->string('settlements_zone');
            $table->string('settlements_type_name');

            $table->integer('municipalty_key');
            $table->string('municipalty_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_codes ');
    }
};
