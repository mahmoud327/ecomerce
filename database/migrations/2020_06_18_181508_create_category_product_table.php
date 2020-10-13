<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryProductTable extends Migration {

	public function up()
	{
		
		Schema::create('category_product', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('product_id');
			$table->integer('category_id');
		
		});
	}

	public function down()
	{
		Schema::drop('category_product');
	}
}