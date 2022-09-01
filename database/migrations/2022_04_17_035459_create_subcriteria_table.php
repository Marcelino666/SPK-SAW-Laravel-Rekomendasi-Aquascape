<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('criteria_id')->references('id')->on('criteria');
            $table->string('subcriteria_name');
            $table->integer('weight_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcriteria');
    }
}
