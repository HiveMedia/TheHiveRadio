<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shows', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->string('title');
            $table->text('description');
            $table->text('description_short');
            $table->string('icon_url');
            $table->string('banner_url');
            $table->boolean('public');


        });

    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shows');
        Schema::drop('schedule');
	}

}
