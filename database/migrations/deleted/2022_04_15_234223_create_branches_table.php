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
        //Done
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id')->foreign()->references('hotels')->on('id');
            $table->integer('user_id')->foreign()->references('users')->on('id');
            $table->integer('city_id')->foreign()->references('cities')->on('id');
            $table->string('map_location');
            $table->string('location_description')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('branches');
    }
};
