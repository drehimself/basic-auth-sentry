<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use Sentry;

class SessionsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(LoginFormRequest $request)
    {
        $input = $request->only('email', 'password');

        try {
            Sentry::authenticate($input, \Input::has('remember'));
        } catch (\Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return redirect()->back()->withInput()->withErrorMessage('Invalid credentials provided');
        } catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            return redirect()->back()->withInput()->withErrorMessage('User Not Activated.');
        }

        // Logged in successfully - redirect based on type of user
        $user = Sentry::getUser();
        $admin = Sentry::findGroupByName('Admins');
        $users = Sentry::findGroupByName('Users');

        if ($user->inGroup($admin)) {
            return redirect()->intended('admin');
        } elseif ($user->inGroup($users)) {
            return redirect()->intended('/');
        }
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

        //return Redirect::home();

        return redirect()->route('home');
    }
}
