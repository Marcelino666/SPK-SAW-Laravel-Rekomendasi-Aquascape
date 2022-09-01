<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->integer('growt_rate_weight_value');
            $table->integer('light_demand_weight_value');
            $table->integer('co2_demand_weight_value');
            $table->integer('hardness_tolerance_weight_value');
            $table->integer('demands_weight_value');
            $table->integer('temperature_weight_value');
            $table->float('tank_length');
            $table->float('tank_width');
            $table->float('tank_height');
            $table->float('lighting');
            $table->string('co2');
            $table->float('temperature');
            $table->float('ph');
            $table->string('hardness_tolerance');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rankings');
    }
}
