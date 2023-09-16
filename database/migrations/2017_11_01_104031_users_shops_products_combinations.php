<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersShopsProductsCombinations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('users_shops_products_combinations', function(Blueprint $table)
        {
			$table->increments('id');
			$table->integer('product_id')->unsigned()->index();
			$table->integer('variant_id')->unsigned()->index();
			$table->integer('attribute_id')->unsigned()->index();
			$table->integer('attribute_value_id')->unsigned()->index();
			
			
			$table->timestamps();
			
			$table->foreign('product_id')->references('id')->on('users_shops_products')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('variant_id')->references('id')->on('users_shops_products_variants')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('attribute_id')->references('id')->on('users_shops_products_attributes')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('attribute_value_id')->references('id')->on('users_shops_products_attributes_values')->onUpdate('cascade')->onDelete('cascade');
			
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_shops_products_combinations');
    }
}
