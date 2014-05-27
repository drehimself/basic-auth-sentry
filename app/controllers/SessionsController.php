<?php

use basicAuth\formValidation\LoginForm;

class SessionsController extends \BaseController {

	protected $loginForm;

	function __construct(LoginForm $loginForm)
	{
		$this->loginForm = $loginForm;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->loginForm->validate($input = Input::only('email', 'password'));

		try
		{
			Sentry::authenticate($input, Input::has('remember'));
		}

		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		   	return Redirect::back()->withInput()->withErrorMessage('Invalid credentials provided');
		}
		catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		   	return Redirect::back()->withInput()->withErrorMessage('User Not Activated.');
		}

		// Logged in successfully - redirect based on type of user
		$user = Sentry::getUser();
	    $admin = Sentry::findGroupByName('Admins');
	    $users = Sentry::findGroupByName('Users');

	    if ($user->inGroup($admin)) return Redirect::intended('admin');
	    elseif ($user->inGroup($users)) return Redirect::intended('/');


	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id=null)
	{
		Sentry::logout();

		return Redirect::home();
	}

}