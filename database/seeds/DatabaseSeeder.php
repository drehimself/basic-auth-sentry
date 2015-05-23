<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

// use database\seeds\SentryGroupSeeder;
// use database\seeds\SentryUserSeeder;
// use database\seeds\SentryUserGroupSeeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('SentryGroupSeeder');
		$this->call('SentryUserSeeder');
		$this->call('SentryUserGroupSeeder');

		$this->command->info('All tables seeded!');
	}

}
