<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Abouts2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('L_Abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page');
            $table->string('img');
            $table->string('title');
            $table->string('about');
            $table->string('url');
            $table->string('href');
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
        Schema::drop('L_Abouts');
    }
}
