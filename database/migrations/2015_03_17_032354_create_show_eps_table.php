<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowEpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('show_eps', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('show_id');
            $table->string('title');
            $table->text('description');
            $table->string('releasedate');
            $table->boolean('public');
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
		Schema::drop('show_eps');
	}

}
