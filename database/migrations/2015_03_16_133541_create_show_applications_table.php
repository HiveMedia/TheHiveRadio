<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('show_applications', function(Blueprint $table)
		{
			$table->increments('id'); //ShowID
            // User ID of ShowHost
            $table->integer('host_id');
            // Show Name
            $table->string('title');
            // Public description
            $table->text('description');
            $table->text('description_short');
            // Podcast/Talk Show/Live DJ/Other
            $table->string('type');
            // Live
            $table->boolean('live');
            // Existence
            $table->boolean('existence');
            // What Age group
            $table->string('classifications');
            // When should I stream
            $table->string('timeslot');
            // Length of show
            $table->string('length');
            // http://www.speedtest.net/
            $table->string('speedtest');
            // Other comments
            $table->text('other');
            $table->tinyInteger('status');
            /*
             * STATUS CODES:
             * 0 = Null
             * 1 = Pending
             * 2 = Approved
             * 3 = Rejected
             */
            $table->boolean('tos');
			$table->timestamps();
		});
        Schema::create('show_staff', function(Blueprint $table)
        {
            $table->integer('show_id');
            $table->integer('user_id');
        });
        Schema::table('shows', function(Blueprint $table)
        {
            //
            $table->integer('host_id');
        });



	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('show_applications');
        Schema::drop('show_staff');

        Schema::table('shows', function(Blueprint $table)
        {
            //
            $table->removeColumn('host_id');
        });
	}


}
