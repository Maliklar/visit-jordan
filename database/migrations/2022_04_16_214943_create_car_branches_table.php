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
        Schema::create('car_branches', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->foreign()->references('car_companies')->on('id');
            $table->integer('user_id')->foreign()->references('users')->on('id');
            $table->string('name')->nullable();
            $table->string('map_location')->nullable();
            $table->string('location_description')->nullable();
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
        Schema::dropIfExists('car_branches');
    }
};
