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
        Schema::create('branch_food_and_drinkn_services', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id')->for;

            $table->integer('fruits');
            $table->integer('wine_champagne');
            $table->integer('special_diet_menus');
            $table->integer('breakfast_in_the_room');
            $table->integer('resturant');


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
        Schema::dropIfExists('branch_food_and_drinkn_services');
    }
};
