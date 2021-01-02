<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRalliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rallies', function (Blueprint $table) {
            $table->id();
            $table->string("country");
            $table->string("description");
            $table->integer("idealGear");
            $table->integer("idealBrakeForce");
            $table->integer("idealRideHeight");
            $table->integer("order");
            $table->boolean("isFinished");
            $table->integer("edition");
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
        Schema::dropIfExists('rallies');
    }
}
