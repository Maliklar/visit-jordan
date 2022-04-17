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
        Schema::create('cars_in_branch', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->foreign()->references('car_companies')->on('id');
            $table->integer('user_id')->foreign()->references('users')->on('id');
            $table->integer('branch_id')->foreign()->references('car_branches')->on('id');
            $table->string('name');
            $table->string('image');
            $table->integer('year');
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
        Schema::dropIfExists('cars_in_branch');
    }
};
