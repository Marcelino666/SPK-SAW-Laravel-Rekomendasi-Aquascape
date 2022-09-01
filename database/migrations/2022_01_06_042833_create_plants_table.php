<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('origin')->nullable();
            $table->string('family')->nullable();
            $table->string('growt_rate')->nullable();
            $table->string('light_demand');
            $table->string('co2_demand');
            $table->string('hardness_tolerance');
            $table->string('placement_area');
            $table->string('ph_tolerance');
            $table->string('temperature');
            $table->string('growth_height')->nullable();
            $table->string('growth_width')->nullable();
            $table->string('demands')->nullable();
            $table->text('description')->nullable();
            $table->text('images')->nullable();
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
        Schema::dropIfExists('plants');
    }
}
