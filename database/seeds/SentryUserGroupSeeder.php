<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SentryUserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_groups')->delete();

        $userUser = Sentry::getUserProvider()->findByLogin('user@user.com');
        $adminUser = Sentry::getUserProvider()->findByLogin('admin@admin.com');

        $userGroup = Sentry::getGroupProvider()->findByName('Users');
        $adminGroup = Sentry::getGroupProvider()->findByName('Admins');

        // Assign the groups to the users
        $userUser->addGroup($userGroup);
        $adminUser->addGroup($adminGroup);

        $this->command->info('Users assigned to groups seeded!');
    }
}
