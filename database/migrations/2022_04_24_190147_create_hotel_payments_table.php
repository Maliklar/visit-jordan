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
        Schema::create('hotel_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->foreign()->references('users')->on('id'); // Points to the user that make to reservation
            $table->integer('room_id')->foreign()->references('rooms')->on('id'); // Points to the Room
            $table->float('amount');
            // Add another payment services api data here
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
        Schema::dropIfExists('hotel_payments');
    }
};
