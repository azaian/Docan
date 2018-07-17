<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSouqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souqs', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('cat_id')->unsigned();
      $table->foreign('cat_id')->references('id')->on('categories');
      $table->integer('product_id')->unsigned();
      $table->foreign('product_id')->references('id')->on('products');
      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('souqs');
    }
}
