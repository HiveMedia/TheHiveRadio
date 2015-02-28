<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRadioschedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('radioschedule', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('showid');
            $table->text('start');
            $table->text('length');
            $table->boolean('recurring');
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
		Schema::drop('radioschedules');
	}

}
