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
			Sentry::authenticate($input, Input::get('remember') == 'remember');
		}

		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    // Sometimes a user is found, however hashed credentials do
		    // not match. Therefore a user technically doesn't exist
		    // by those credentials. Check the error message returned
		    // for more information.
		   	return Redirect::back()->withInput()->withFlashMessage('Invalid credentials provided');
		}
		catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    	return Redirect::back()->withInput()->withFlashMessage('User Not Activated.');
		}

		// Logged in successfully
		return Redirect::intended('/');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id=null)
	{
		//Auth::logout();
		Sentry::logout();

		return Redirect::home();
	}

}