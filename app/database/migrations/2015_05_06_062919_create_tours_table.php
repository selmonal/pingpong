<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tours', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tour_category_id')->default(0);
			$table->integer('like_count')->default(0);
			$table->string('name');
			$table->string('image');
			$table->date('start_date');
			$table->date('end_date');
			$table->double('price');
			$table->text('description');
			$table->text('itinerary');
			$table->text('summary');
			$table->text('media');
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
		Schema::drop('tours');
	}

}
