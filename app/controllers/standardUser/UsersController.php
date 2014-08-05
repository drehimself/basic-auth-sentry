<?php

use basicAuth\Repo\UserRepositoryInterface;
use basicAuth\formValidation\UsersEditForm;

class UsersController extends \BaseController {

	/**
	 * @var $user
	 */
	protected $user;

	/**
	* @var usersEditForm
	*/
	protected $usersEditForm;

	/**
	* @param UsersEditForm $usersEditForm
	*/
	function __construct(UserRepositoryInterface $user, UsersEditForm $usersEditForm)
	{
		$this->user = $user;
		$this->usersEditForm = $usersEditForm;

		$this->beforeFilter('currentUser', ['only' => ['show', 'edit', 'update']]);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// $user = User::findOrFail($id);
		$user = $this->user->find($id);

		return View::make('protected.standardUser.show')->withUser($user);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// $user = User::findOrFail($id);
		$user = $this->user->find($id);

		return View::make('protected.standardUser.edit')->withUser($user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		// $user = User::findOrFail($id);
		$user = $this->user->find($id);

		if (! Input::has("password"))
		{
			$input = Input::only('email', 'first_name', 'last_name');

			$this->usersEditForm->excludeUserId($user->id)->validate($input);

			$user->fill($input)->save();

			return Redirect::route('profiles.edit', $user->id)->withFlashMessage('User has been updated successfully!');
		}

		else
		{
			$input = Input::only('email', 'first_name', 'last_name', 'password', 'password_confirmation');

			$this->usersEditForm->excludeUserId($user->id)->validate($input);

			$input = array_except($input, ['password_confirmation']);

			$user->fill($input)->save();

			$user->save();

			return Redirect::route('profiles.edit', $user->id)->withFlashMessage('User (and password) has been updated successfully!');
		}
	}



}