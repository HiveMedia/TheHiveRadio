<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applications', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id');

            $table->string('firstname');
            $table->string('lastname');
            $table->string('dob');
            $table->string('country');
            $table->string('email');
            $table->string('skype');
            $table->string('handle');
            $table->text('references');
            $table->boolean('tos');
            $table->tinyInteger('status');
            /*
             * STATUS CODES:
             * 0 = Null
             * 1 = Pending
             * 2 = Approved
             * 3 = Rejected
             */
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
		Schema::drop('applications');
	}

}

