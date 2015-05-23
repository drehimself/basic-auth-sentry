<?php


# Static Pages. Redirecting admin so admin cannot access these pages.
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);
Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);

# Registration
Route::get('register', 'RegistrationController@create');
Route::post('register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);

# Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController' , ['only' => ['create','store','destroy']]);

# Forgotten Password
Route::get('forgot_password', 'Auth\PasswordController@getEmail');
Route::post('forgot_password','Auth\PasswordController@postEmail');
Route::get('reset_password/{token}', 'Auth\PasswordController@getReset');
Route::post('reset_password/{token}', 'Auth\PasswordController@postReset');


// Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
