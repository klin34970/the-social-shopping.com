<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('users_addresses', function(Blueprint $table)
        {
            $table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			
			$table->string('company', 64);
			$table->string('lastname', 64);
			$table->string('firstname', 64);
			
			$table->string('address_1', 128);
			$table->string('address_2', 128)->nullable();
			$table->string('address_3', 128)->nullable();
			$table->string('postcode', 12);
			$table->string('city', 64);
			$table->string('country', 64);
			$table->string('phone_1', 32);
			$table->string('phone_2', 32)->nullable();
			
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
        Schema::drop('users_addresses');
    }
}
