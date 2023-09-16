<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StripeOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_orders_stripe', function(Blueprint $table)
        {
            $table->increments('id');
			$table->integer('order_id')->unsigned()->index();

			$table->string('charge_id', 128);
			$table->string('charger_balance_transaction', 128);
			$table->string('charge_card_id', 128);
			$table->string('charge_customer', 128);
			
            $table->timestamps();
			$table->foreign('order_id')->references('id')->on('users_orders')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_orders_stripe');
    }
}
