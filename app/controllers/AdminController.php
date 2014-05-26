<?php

class AdminController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getHome()
	{
		$users = User::all();
		$admin = Sentry::findGroupByName('Admins');
		return View::make('protected.admin.admin_dashboard')->withUsers($users)->withAdmin($admin);
	}



}