<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForgotURL extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('show_eps', function(Blueprint $table)
		{
			//
            $table->text('URL');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('show_eps', function(Blueprint $table)
		{
			//
            $table->removeColumn('URL');
        });
	}

}
