@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')

	@if (Session::has('flash_message'))
			<p>{{ Session::get('flash_message') }}</p>
	@endif


	<div class="jumbotron">
		<h1>Admin Page</h1>
		<p>This page is for admins only!</p>
	</div>


@stop