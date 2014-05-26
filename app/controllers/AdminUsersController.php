<?php

use basicAuth\formValidation\UsersEditForm;

class AdminUsersController extends \BaseController {

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
		$users = User::all();
		$admin = Sentry::findGroupByName('Admins');
		return View::make('protected.admin.list_users')->withUsers($users)->withAdmin($admin);
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

		$user_group = $user->getGroups()->first()->name;

		$groups = Sentry::findAllGroups();


		return View::make('protected.admin.show_user')->withUser($user)->withUserGroup($user_group);
		
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

		$groups = Sentry::findAllGroups();

		$user_group = $user->getGroups()->first()->id;

		$array_groups = [];

		foreach ($groups as $group) {
			$array_groups = array_add($array_groups, $group->id, $group->name);	
		}

		return View::make('protected.admin.edit_user', ['user' => $user, 'groups' => $array_groups, 'user_group' =>$user_group]);
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

			$this->usersEditForm->validateUpdate($user->id, $input);

			$user->fill($input)->save();

			return Redirect::route('admin.profiles.edit', $user->id)->withFlashMessage('User has been updated successfully!');
		}

		else
		{
			$input = Input::only('email', 'first_name', 'last_name', 'password', 'password_confirmation');

			$this->usersEditForm->validateUpdate($user->id, $input);

			$input = Input::only('email', 'first_name', 'last_name', 'password');

			$user->fill($input)->save();

			$user->save();

			return Redirect::route('admin.profiles.edit', $user->id)->withFlashMessage('User (and password) has been updated successfully!');

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