<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriesShops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('categories_shops', function (Blueprint $table) {
            $table->increments('id');
          $table->integer('cat_id')->unsigned();
      $table->foreign('cat_id')->references('id')->on('categories');
      $table->integer('shop_id')->unsigned();
      $table->foreign('shop_id')->references('id')->on('shops');
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
        Schema::drop('categories_shops');
    }
}
