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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id')->foreign()->references('hotels')->on('id');
            $table->integer('branch_id')->foreign()->references('hotel_branches')->on('id');
            $table->integer('category_id')->foreign()->references('room_categories')->on('id');
            $table->integer('reservation_id')->foreign()->references('room_reservations')->on('id')->nullable();

            $table->boolean('active')->default(false);
            $table->boolean('available')->default(false);
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
        Schema::dropIfExists('rooms');
    }
};
