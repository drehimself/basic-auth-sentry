<?php


# Static Pages
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);

# Registration
Route::get('/register', 'RegistrationController@create')->before('guest');
Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);

# Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create'])->before('guest');
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController' , ['only' => ['create','store','destroy']]);

# Forgotten Password
Route::get('forgot_password', 'RemindersController@getRemind')->before('guest');;
Route::post('forgot_password','RemindersController@postRemind');
Route::get('reset_password/{token}', 'RemindersController@getReset')->before('guest');;
Route::post('reset_password/{token}', 'RemindersController@postReset');

# Admin Routes
Route::group(['before' => 'auth|admin'], function()
{
	Route::get('/admin', ['as' => 'admin_dashboard', 'uses' => 'AdminController@getHome']);
    Route::get('/admin/blah', function()
    {
        return 'blah';
    });

    Route::get('admin/blah2', function()
    {
        return 'blah2';
    });

    Route::get('here', function()
    {
        return 'should have access.';
    });
});

# Standard User Routes
Route::group(['before' => 'auth|standardUser'],function()
{
	Route::get('/user', ['as' => 'user_dashboard', 'uses' => 'UserController@getHome']);
    Route::get('/user/blah', function()
    {
        return 'blah';
    });

    Route::get('user/blah2', function()
    {
        return 'blah2';
    });
});



