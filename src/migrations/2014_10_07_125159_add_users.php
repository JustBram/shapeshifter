<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the user
		$user = Sentry::createUser(array(
			                           'email'     => 'info@wearejust.com',
			                           'password'  => 'test',
			                           'activated' => true,
		                           ));

		// Find the group using the group id
		$adminGroup = Sentry::findGroupByName('Administrators');

		// Assign the group to the user
		$user->addGroup($adminGroup);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('cms_users_groups')->truncate();
		DB::table('cms_users')->truncate();
	}

}