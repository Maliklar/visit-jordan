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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id')->foreign()->references('hotels')->on('id');
            $table->integer('user_id')->foreign()->references('users')->on('id');
            $table->string('map_location');
            $table->string('name');
            $table->string('location_description')->nullable();
            $table->integer('number_of_floors')->nullable();
            $table->integer('number_of_rooms')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('has_single')->default(false);
            $table->boolean('has_double')->default(false);
            $table->boolean('has_trible')->default(false);
            $table->boolean('has_suite')->default(false);
            $table->integer('number_of_single')->nullable();
            $table->integer('number_of_double')->nullable();
            $table->integer('number_of_trible')->nullable();
            $table->integer('number_of_suites')->nullable();
            $table->boolean('smoking')->default(false);
            $table->boolean('wi_fi')->default(false);
            $table->boolean('pets')->default(false);
            $table->boolean('swimming_pool')->default(false);
            $table->boolean('buffet')->default(false);
            $table->boolean('launch_included')->default(false);;
            $table->boolean('ac')->default(false);

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
