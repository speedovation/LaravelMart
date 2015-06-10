<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code');
			$table->string('name');
			$table->integer('stock');
			$table->float('mrp');
			$table->float('price');
			$table->float('discount');
			$table->integer('category_id');
			$table->string('image');
			$table->text('short_desc');
			$table->longtext('long_desc');
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
		Schema::drop('products');
	}

}
