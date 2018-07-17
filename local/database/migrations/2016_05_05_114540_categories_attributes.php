<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriesAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('categories_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cat_id')->unsigned();
      $table->foreign('cat_id')->references('id')->on('categories');
      $table->integer('attribute_id')->unsigned();
      $table->foreign('attribute_id')->references('id')->on('attributes');
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
              Schema::drop('categories_attributes');
        //
    }
}
