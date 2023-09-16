<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersShopsProductsFeatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_shops_products_features', function(Blueprint $table)
        {
            $table->increments('id');
			$table->integer('product_id')->unsigned()->index();

			$table->string('title', 32);
			$table->string('description', 255);
			$table->tinyInteger('position');
			
            $table->timestamps();
			$table->foreign('product_id')->references('id')->on('users_shops_products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_shops_products_features');
    }
}
