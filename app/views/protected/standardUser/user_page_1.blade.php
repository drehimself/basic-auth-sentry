@extends('master')

@section('title', 'Registered Users')

@section('content')

	@if (Session::has('flash_message'))
			<p>{{ Session::get('flash_message') }}</p>
	@endif

	@if (Sentry::check())
		<p>{{ "Welcome, " . Sentry::getUser()->first_name }}</p>
	@endif

	<p>This is for standard users only!</p>

@stop