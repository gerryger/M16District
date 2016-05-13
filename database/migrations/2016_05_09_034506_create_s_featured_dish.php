<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSFeaturedDish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_featured_dish', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('heading1');
            $table->string('heading2');
            $table->string('description');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
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
        Schema::drop('s_featured_dish');
    }
}
