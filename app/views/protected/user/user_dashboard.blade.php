@extends('protected.user.master')

@section('content')

	@if (Session::has('flash_message'))
		<div class="form-group">
			<p>{{ Session::get('flash_message') }}</p>
		</div>
	@endif

	@if (Sentry::check())
		<p>{{ "Welcome, " . Sentry::getUser()->first_name }}</p>
	@endif

	<p>This is for standard users only!</p>

@stop