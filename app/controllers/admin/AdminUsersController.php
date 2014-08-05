<?php

use basicAuth\Repo\UserRepositoryInterface;
use basicAuth\formValidation\AdminUsersEditForm;

class AdminUsersController extends \BaseController {

	/**
	 * @var $user
	 */
	protected $user;

	/**
	* @var adminUsersEditForm
	*/
	protected $adminUsersEditForm;

	/**
	* @param AdminUsersEditForm $AdminUsersEditForm
	*/
	function __construct(UserRepositoryInterface $user, AdminUsersEditForm $adminUsersEditForm)
	{
		$this->user = $user;
		$this->adminUsersEditForm = $adminUsersEditForm;

		//$this->beforeFilter('currentUser', ['only' => ['show', 'edit', 'update']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->getAll();
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
		$user = $this->user->find($id);

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
		$user = $this->user->find($id);

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

		$user = $this->user->find($id);


		if (! Input::has("password"))
		{
			$input = Input::only('account_type' , 'email', 'first_name', 'last_name');

			$this->adminUsersEditForm->excludeUserId($user->id)->validate($input);

			$input = array_except($input, ['account_type']);

			$user->fill($input)->save();

			$this->user->updateGroup($id, Input::get('account_type'));


			return Redirect::route('admin.profiles.edit', $user->id)->withFlashMessage('User has been updated successfully!');
		}

		else
		{
			$input = Input::only('account_type', 'email', 'first_name', 'last_name', 'password', 'password_confirmation');

			$this->adminUsersEditForm->excludeUserId($user->id)->validate($input);

			$input = array_except($input, ['account_type', 'password_confirmation']);

			$user->fill($input)->save();

			$user->save();

			$this->user->updateGroup($id, Input::get('account_type'));

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