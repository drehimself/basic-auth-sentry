<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SentryUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        Sentry::getUserProvider()->create([
            'email'    => 'user@user.com',
            'password' => 'sentryuser',
            'first_name' => 'UserFirstName',
            'last_name' => 'UserLastName',
            'activated' => 1,
        ]);

        Sentry::getUserProvider()->create([
            'email'    => 'admin@admin.com',
            'password' => 'sentryadmin',
            'first_name' => 'AdminFirstName',
            'last_name' => 'AdminLastName',
            'activated' => 1,
        ]);

        $this->command->info('Users seeded!');
    }
}
