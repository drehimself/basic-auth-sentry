<?php

class UserController extends \BaseController {



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getHome()
	{
		return View::make('protected.user.user_dashboard');
	}



}