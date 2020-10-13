<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
		
			$table->string('email', 255);
			$table->string('username', 255);
			$table->string('password', 255);
		
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}