<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops_translations', function (Blueprint $table) {
              $table->increments('id');
      $table->string('name');
      $table->string('description');
      $table->string('keyword');
      $table->string('address');
      $table->string('lang',2);
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
        Schema::drop('shops_translations');
    }
}
