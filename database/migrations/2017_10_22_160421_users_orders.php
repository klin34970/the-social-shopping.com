<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_orders', function(Blueprint $table)
        {
            $table->increments('id');
			$table->integer('customer_id')->unsigned()->index();
			$table->integer('seller_id')->unsigned()->index();
			$table->integer('address_id')->unsigned()->index();
			
			$table->integer('product_id')->unsigned()->index();
			$table->string('product_title', 64);
			$table->decimal('product_price', 20, 6);
			$table->decimal('product_tax', 20, 6);
			$table->integer('product_quantity');
			
			$table->string('reference', 15);
			
			$table->integer('current_state');
			$table->string('payment', 128);
			$table->string('module', 128);
			
			$table->string('currency', 3);
			
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
        Schema::drop('users_orders');
    }
}
