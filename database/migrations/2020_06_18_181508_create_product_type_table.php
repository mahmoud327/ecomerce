<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTypeTable extends Migration {

	public function up()
	{
		
		Schema::create('product_type', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('product_id');
			$table->integer('type_id');
		
		});
	}

	public function down()
	{
		Schema::drop('product_type');
	}
}