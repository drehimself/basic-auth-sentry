<?php

# CSRF Protection
Route::when('*', 'csrf', ['POST', 'PUT', 'PATCH', 'DELETE']);

# Static Pages. Redirecting admin so admin cannot access these pages.
Route::group(['before' => 'redirectAdmin'], function()
{
	Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
	Route::get('/about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);
	Route::get('/contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);
});

# Registration
Route::group(['before' => 'guest'], function()
{
	Route::get('/register', 'RegistrationController@create');
	Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);
});

# Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create'])->before('guest');
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController' , ['only' => ['create','store','destroy']]);

# Forgotten Password
Route::group(['before' => 'guest'], function()
{
	Route::get('forgot_password', 'RemindersController@getRemind');
	Route::post('forgot_password','RemindersController@postRemind');
	Route::get('reset_password/{token}', 'RemindersController@getReset');
	Route::post('reset_password/{token}', 'RemindersController@postReset');
});


# Standard User Routes
Route::group(['before' => 'auth|standardUser'], function()
{
	Route::get('userProtected', 'StandardUserController@getUserProtected');
	Route::resource('profiles', 'UsersController', ['only' => ['show', 'edit', 'update']]);


});

# Admin Routes
Route::group(['before' => 'auth|admin'], function()
{
	Route::get('/admin', ['as' => 'admin_dashboard', 'uses' => 'AdminController@getHome']);
    Route::resource('admin/profiles', 'AdminUsersController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
});



