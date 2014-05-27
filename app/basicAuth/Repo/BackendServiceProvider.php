<?php namespace basicAuth\Repo;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind(
			'basicAuth\Repo\UserRepositoryInterface',
			'basicAuth\Repo\DbUserRepository'
		);
	}
}