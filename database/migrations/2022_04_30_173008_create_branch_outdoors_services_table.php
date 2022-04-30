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
        Schema::create('branch_outdoors_services', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id');
            $table->integer('fireplace'); // 0- no 1- yes 2- yes with additional charge
            $table->integer('sun_terrace');
            $table->integer('furnitire');

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
        Schema::dropIfExists('branch_outdoors_services');
    }
};
