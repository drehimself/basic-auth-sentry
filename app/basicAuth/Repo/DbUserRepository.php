<?php namespace basicAuth\Repo;

use \User;
use \DB;
use \Sentry;

class DbUserRepository implements UserRepositoryInterface {

	public function getAll()
	{
		return User::all();
	}

	public function find($id)
	{
		return User::findOrFail($id);
	}

	public function updateGroup($user_id, $group_id)
    {
    	DB::table('users_groups')
            ->where('user_id', $user_id)
            ->update(array('group_id' => $group_id));
    }

    public function create($fields)
    {
    	return Sentry::createUser($fields);
    }



}