@extends('master')

@section('content')
	<form action="{{ action('RemindersController@postReset') }}" method="POST">
	    <input type="hidden" name="token" value="{{ $token }}">
	    <input type="email" name="email">
	    <input type="password" name="password">
	    <input type="password" name="password_confirmation">
	    <input type="submit" value="Reset Password">
	</form>

	@if(Session::has('error'))
	    <div class="alert-box success">
	        <h2>{{ Session::get('error') }}</h2>
	    </div>
	@endif
@stop