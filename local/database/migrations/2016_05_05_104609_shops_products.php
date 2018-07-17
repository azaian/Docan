<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopsProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('shops_products', function (Blueprint $table) {
               $table->increments('id');
                $table->integer('shop_id')->unsigned();
      $table->foreign('shop_id')->references('id')->on('shops');
         $table->integer('product_id')->unsigned();
      $table->foreign('product_id')->references('id')->on('products');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::drop('shops_products');
    }
}
