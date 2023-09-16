<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersShopsProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_shops_products', function(Blueprint $table)
        {
            $table->increments('id');
			$table->string('unique_id', 15);
			$table->integer('user_id')->unsigned()->index();
			$table->integer('shop_id')->unsigned()->index();
			$table->integer('supplier_id')->unsigned()->index();
			
			$table->string('title', 64);
			$table->string('sku', 64)->nullable();
			$table->string('category', 64);
			$table->string('short_description', 128)->nullable();
			$table->text('full_description')->nullable();
			$table->decimal('price', 20, 6);
			$table->decimal('price_discount', 20, 6)->nullable();
			$table->decimal('taxe', 20, 6);
			$table->integer('virtual_stock')->nullable();
			//$table->string('thumbnail', 128);
			$table->boolean('active');

			
            $table->timestamps();
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('shop_id')->references('id')->on('users_shops')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_shops_products');
    }
}
