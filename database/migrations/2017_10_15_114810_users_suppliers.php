<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersSuppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_suppliers', function(Blueprint $table)
        {
            $table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			
			$table->string('company', 64);
			$table->string('address_1', 128);
			$table->string('address_2', 128)->nullable();
			$table->string('address_3', 128)->nullable();
			$table->string('postcode', 12);
			$table->string('city', 64);
			$table->string('country', 64);
			$table->string('phone_1', 32);
			$table->string('phone_2', 32)->nullable();
			$table->string('email', 64);
			$table->string('website', 128)->nullable();
			
			
			$table->string('legal_form', 64);
			$table->string('social_reason', 16);
			$table->string('registration', 32);
			$table->string('vat', 32)->nullable();
			
            $table->timestamps();
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_suppliers');
    }
}
