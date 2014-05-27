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

		{{ link_to_route('profiles.edit', 'Edit Your Profile', $user->id, ['class' => 'btn btn-primary']) }}

	@endif

@stop