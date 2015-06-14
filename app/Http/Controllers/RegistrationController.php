<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\RegistrationFormRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    /**
     * @var $user
     */
    protected $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('registration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(RegistrationFormRequest $request)
    {
        $input = $request->only('email', 'password', 'first_name', 'last_name');
        $input = array_add($input, 'activated', true);

        $user = $this->user->create($input);

        // Find the group using the group name
        $usersGroup = \Sentry::findGroupByName('Users');

        // Assign the group to the user
        $user->addGroup($usersGroup);

        return redirect('login')->withFlashMessage('User Successfully Created!');
    }
}
