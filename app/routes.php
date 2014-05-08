<?php


# Home
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

# Registration
Route::get('/register', 'RegistrationController@create')->before('guest');
Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);


# Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController' , ['only' => ['create','store','destroy']]);

# Forgotten Password
Route::get('forgot_password', 'RemindersController@getRemind');
Route::post('forgot_password','RemindersController@postRemind');
Route::get('reset_password/{token}', 'RemindersController@getReset');
Route::post('reset_password/{token}', 'RemindersController@postReset');


