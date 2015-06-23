<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\AdminUsersEditFormRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Sentry;

class AdminUsersController extends Controller
{
    /**
     * @var $user
     */
    protected $user;


    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;


        //$this->middleware('notCurrentUser', ['only' => ['show', 'edit', 'update']]);
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
        return view('protected.admin.list_users')->withUsers($users)->withAdmin($admin);
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

        return view('protected.admin.show_user')->withUser($user)->withUserGroup($user_group);
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

        return view('protected.admin.edit_user', ['user' => $user, 'groups' => $array_groups, 'user_group' =>$user_group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, AdminUsersEditFormRequest $request)
    {
        $user = $this->user->find($id);

        if (! $request->has("password")) {
            $input = $request->only('email', 'first_name', 'last_name');

            // $this->adminUsersEditForm->excludeUserId($user->id)->validate($input);

            // $input = array_except($input, ['account_type']);

            $user->fill($input)->save();

            $this->user->updateGroup($id, $request->input('account_type'));

            return redirect()->route('admin.profiles.edit', $user->id)
                             ->withFlashMessage('User has been updated successfully!');

        } else {
            $input = $request->only('email', 'first_name', 'last_name', 'password');

            // $this->adminUsersEditForm->excludeUserId($user->id)->validate($input);

            // $input = array_except($input, ['account_type', 'password_confirmation']);

            $user->fill($input)->save();

            $user->save();

            $this->user->updateGroup($id, $request->input('account_type'));

            return redirect()->route('admin.profiles.edit', $user->id)
                             ->withFlashMessage('User (and password) has been updated successfully!');
        }
    }
}
