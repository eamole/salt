<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTherapistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		 Schema::create("therapists",function($table){
		 	$table->increments("id");
		 	$table->string("name");
		 	$table->string("phone");
		 	$table->string("email");
		 	$table->string("username");
		 	$table->string("password");
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
		//
		Schema::drop("therapists");
	}

}
