<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersShopsStripe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_shops_stripe', function(Blueprint $table)
        {
            $table->increments('id');
			$table->integer('shop_id')->unsigned()->index();

			$table->string('key_public', 128);
			$table->string('key_private', 128);
			
            $table->timestamps();
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
        Schema::drop('users_shops_stripe');
    }
}
