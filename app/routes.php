<?php

# Static Pages. Redirecting admin so admin cannot access these pages.
Route::group(['before' => 'redirectAdmin'], function()
{
	Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
	Route::get('/about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);
	Route::get('/contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);
	Route::get('/contact/blah', ['as' => 'contact_blah', 'uses' => 'PagesController@getContact']);

});

# Registration
Route::get('/register', 'RegistrationController@create')->before('guest');
Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store'])->before('guest');

# Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create'])->before('guest');
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController' , ['only' => ['create','store','destroy']]);

# Forgotten Password
Route::get('forgot_password', 'RemindersController@getRemind')->before('guest');
Route::post('forgot_password','RemindersController@postRemind')->before('guest');
Route::get('reset_password/{token}', 'RemindersController@getReset')->before('guest');
Route::post('reset_password/{token}', 'RemindersController@postReset')->before('guest');

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

    Route::resource('admin/profiles', 'UsersController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
});

# Standard User Routes
Route::group(['before' => 'auth|standardUser|currentUser'], function()
{
	//Route::get('/user', ['as' => 'user_dashboard', 'uses' => 'StandardUserController@getHome']);
	// Route::get('/profiles/{id}', 'UsersController@show')->where('id', '[0-9]+');
	// Route::get('/profiles/{id}/edit', 'UsersController@edit')->where('id', '[0-9]+');
	// Route::put('/profiles/{id}/update', 'UsersController@update')->where('id', '[0-9]+');
	 Route::resource('profiles', 'UsersController', ['only' => ['show', 'edit', 'update']]);

});



