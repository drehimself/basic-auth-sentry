@extends('master')

@section('title', 'View Profile')

@section('content')

	<h1>{{ $user->first_name }}'s Profile</h1>
	<ul>
		<li>Email Address: {{ $user->email }}</li>
		<li>First Name: {{ $user->first_name }}</li>
		<li>Last Name: {{ $user->last_name }}</li>
	</ul>

	@if(Sentry::check())

		<a class="btn btn-primary" href="{{Request::url()}}/edit">Edit Profile</a>

	@endif

@stop