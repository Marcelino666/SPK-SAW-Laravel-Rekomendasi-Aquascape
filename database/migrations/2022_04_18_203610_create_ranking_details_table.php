<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranking_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rank_id')->references('id')->on('rankings');
            $table->foreignId('plant_id')->references('id')->on('plants');
            $table->integer('growt_rate_weight');
            $table->integer('light_demand_weight');
            $table->integer('co2_demand_weight');
            $table->integer('hardness_tolerance_weight');
            $table->integer('demands_weight');
            $table->integer('temperature_weight');
            $table->double('growt_rate_normalization_weight')->nullable();
            $table->double('light_demand_normalization_weight')->nullable();
            $table->double('co2_demand_normalization_weight')->nullable();
            $table->double('hardness_tolerance_normalization_weight')->nullable();
            $table->double('demands_normalization_weight')->nullable();
            $table->double('temperature_normalization_weight')->nullable();
            $table->double('total')->nullable();
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
        Schema::dropIfExists('ranking_details');
    }
}
