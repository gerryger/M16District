<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Abouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page');
            $table->string('about');
            $table->string('fontfamily');
            $table->string('color');
            $table->string('fontsize');
            $table->string('instagram');
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
        Schema::drop('Abouts');
    }
}
