<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubhausSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('S_sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('image2');
            $table->string('heading');
            $table->string('headingColor');
            $table->string('created_by');
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
        Schema::drop('S_sliders');
    }
}
