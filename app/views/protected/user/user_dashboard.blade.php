@extends('layout')

@section('content')

	@if (Session::has('flash_message'))
		<div class="form-group">
			<p>{{ Session::get('flash_message') }}</p>
		</div>
	@endif

	{{ Sentry::check() ? "Welcome, " . Sentry::getUser()->first_name }}

	<br><br>
	<p>This is for standard users only bitch!</p>

@stop