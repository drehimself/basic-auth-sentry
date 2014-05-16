@extends('protected.admin.master')

@section('content')

	@if (Session::has('flash_message'))
		<div class="form-group">
			<p>{{ Session::get('flash_message') }}</p>
		</div>
	@endif

	@if (Sentry::check())
		<p>{{ "Welcome, " . Sentry::getUser()->first_name }}</p>
	@endif

	<br><br>

	<p>This is for admins only bitch!</p>

@stop