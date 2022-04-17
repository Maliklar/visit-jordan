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
        Schema::create('room_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id')->foreign()->references('hotels')->on('id');
            $table->integer('branch_id')->foreign()->references('hotel_branches')->on('id');
            $table->integer('user_id')->foreign()->references('users')->on('id');

            $table->string('name');
            $table->string('description');
            $table->float('price');
            $table->float('capacity'); // number of people allowed
            $table->integer('single_beds');
            $table->integer('double_beds');
            $table->integer('rooms');
            $table->integer('bathrooms');

            $table->boolean('wifi');
            $table->boolean('balcony');
            $table->boolean('tv');
            $table->boolean('lunch');

            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('room_categories');
    }
};
