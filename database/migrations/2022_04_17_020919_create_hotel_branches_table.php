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
        Schema::create('hotel_branches', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id')->foreign()->references('hotels')->on('id');
            $table->integer('user_id')->foreign()->references('users')->on('id');
            $table->integer('city_id')->foreign()->references('cities')->on('id');
            $table->longText('map_location');
            $table->longText('location_description')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->boolean('swimming_pool');
            $table->boolean('resturant');
            $table->boolean('gym');
            $table->boolean('laundry');

            $table->boolean('active')->default(false);
            $table->longText('active_description')->default('not set');
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
        Schema::dropIfExists('hotel_branches');
    }
};
