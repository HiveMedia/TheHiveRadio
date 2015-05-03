<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Posts;
use App\RadioShows;
use App\ShowStaff;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
        $this->call('BlogTableSeeder');
        $this->call('ShowTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(['email' => 'admin@local.host', 'name' => 'Admin', 'password'=>Hash::make('admin'), 'role'=>'Admin', 'title'=>'Default User', 'job'=>'Default User']);
        User::create(['email' => 'showHost@local.host', 'name' => 'showHost', 'password'=>Hash::make('showHost'), 'role'=>'showHost', 'title'=>'Default showHost', 'job'=>'Default showHost']);
        User::create(['email' => 'showStaff@local.host', 'name' => 'showStaff', 'password'=>Hash::make('showStaff'), 'role'=>'showStaff', 'title'=>'Default showStaff', 'job'=>'Default showStaff']);
        User::create(['email' => 'Editor@local.host', 'name' => 'Editor', 'password'=>Hash::make('Editor'), 'role'=>'Editor', 'title'=>'Default Editor', 'job'=>'Default Editor']);
        User::create(['email' => 'Commenter@local.host', 'name' => 'Commenter', 'password'=>Hash::make('Commenter'), 'role'=>'Commenter', 'title'=>'Default Commenter', 'job'=>'Default Commenter']);
    }

}
class BlogTableSeeder extends Seeder {

    public function run()
    {
        DB::table('posts')->delete();
        Posts::create(['title'=>'Default Blog Post', 'body'=>'Welcome to Hive radio\'s dev environment','poster_id'=>'1']);

    }

}
class ShowTableSeeder extends Seeder {

    public function run()
    {
        DB::table('shows')->delete();
        DB::table('show_staff')->delete();

        RadioShows::create(['title'=>'Default Radio Show', 'description'=>'Im the long description for the default radio show','description_short'=>'Im the default short description','host_id'=>'2']);
        ShowStaff::create(['show_id'=>'1','user_id'=>'2']);
        ShowStaff::create(['show_id'=>'1','user_id'=>'3']);
    }

}