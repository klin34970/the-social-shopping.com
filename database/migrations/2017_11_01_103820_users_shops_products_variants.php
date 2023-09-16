<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersShopsProductsVariants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_shops_products_variants', function(Blueprint $table)
        {
            $table->increments('id');
			$table->integer('product_id')->unsigned()->index();
			$table->string('sku', 64)->nullable();
			$table->decimal('price', 20, 6);
			$table->decimal('price_discount', 20, 6)->nullable();

			$table->integer('virtual_stock')->nullable();

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
		Schema::drop('users_shops_products_variants');
    }
}
