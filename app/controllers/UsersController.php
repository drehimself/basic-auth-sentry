<?php

use basicAuth\formValidation\UsersEditForm;

class UsersController extends \BaseController {

	/**
	* @var usersEditForm
	*/
	protected $usersEditForm;

	/**
	* @param UsersEditForm $usersEditForm
	*/
	function __construct(UsersEditForm $usersEditForm)
	{
		$this->usersEditForm = $usersEditForm;

		//$this->beforeFilter('currentUser', ['only' => ['show', 'edit', 'update']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'return all users';
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('protected.user.profile');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return View::make('protected.user.show')->withUser($user);
		//return 'show profile ' . $id;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);

		return View::make('protected.user.edit')->withUser($user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$user = User::findOrFail($id);

		if (! Input::has("password"))
		{
			$input = Input::only('email', 'first_name', 'last_name');

			$this->usersEditForm->validateUpdate(Request::segment(2), $input);

			$user->fill($input)->save();

			dd('hi');

			return Redirect::back()->withFlashMessage('User has been updated successfully!');

			// return Redirect::route('profiles.edit', $user->id)->withFlashMessage('User has been updated successfully!');
		}

		else
		{
			$input = Input::only('email', 'first_name', 'last_name', 'password', 'password_confirmation');

			$this->usersEditForm->validateUpdate(Request::segment(2), $input);

			$input = Input::only('email', 'first_name', 'last_name', 'password');

			$user->fill($input)->save();

			// $user->email = Input::get('email');
			// $user->first_name = Input::get('first_name');
			// $user->last_name = Input::get('last_name');
			// $user->password = Input::get('password');

			$user->save();

			return Redirect::route('profiles.edit', $user->id)->withFlashMessage('User (and password) has been updated successfully!');

		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}