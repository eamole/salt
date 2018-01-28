<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApptsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	 	Schema::create("appts",function($table){
		 	$table->increments("id");

		 	$table->integer("therapist")->unsigned();
		 	$table->foreign("therapist")->references('id')->on('therepists');

		 	$table->integer("client")->unsigned();
		 	$table->foreign("client")->references('id')->on('clients');

		 	$table->date("date");
		 	$table->time("start");
		 	$table->time("finish");

		 	$table->integer("attended")->nullable();
		 	$table->text("notes");
		 	$table->timestamps();

		 });//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop("appts");//
	}

}
