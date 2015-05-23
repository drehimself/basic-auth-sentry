<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SentryGroupSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('groups')->delete();

		Sentry::getGroupProvider()->create([
	        'name'	=> 'Users',
	        ]);

		Sentry::getGroupProvider()->create([
	        'name'	=> 'Admins',
	        ]);

		$this->command->info('Groups seeded!');
	}

}