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
        Schema::create('branch_food_and_drinks_services', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id')->foreign()->references('branches')->on('id');

            $table->integer('fruits')->nullable();
            $table->integer('wine_champagne')->nullable();
            $table->integer('special_diet_menus')->nullable();
            $table->integer('breakfast_in_the_room')->nullable();
            $table->integer('resturant')->nullable();


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
        Schema::dropIfExists('branch_food_and_drinks_services');
    }
};
