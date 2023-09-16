<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersShopsFacebookPixel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_shops_facebook_pixel', function(Blueprint $table)
        {
            $table->increments('id');
			$table->integer('shop_id')->unsigned()->index();

			$table->string('facebook_pixel_code', 32);
			
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
        Schema::drop('users_shops_facebook_pixela');
    }
}
