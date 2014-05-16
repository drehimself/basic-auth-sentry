@extends('master')

@section('content')
	<h1>Login</h1>

	{{ Form::open(['route' => 'sessions.store']) }}

		<!-- Email field -->
		<div class="form-group">
			{{ Form::label('email', 'Email: ')}}
			{{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required'])}}
			{{ errors_for('email', $errors) }}
		</div>

		<!-- Password field -->
		<div class="form-group">
			{{ Form::label('password', 'Password: ')}}
			{{ Form::password('password', ['class' => 'form-control', 'required' => 'required'])}}
			{{ errors_for('password', $errors) }}
		</div>

		<!-- Remember me field -->
		<div class="form-group">
			{{ Form::label('remember', 'Remember Me? ')}}
			{{ Form::checkbox('remember', 'remember') }}
		</div>

		<!-- Submit field -->
		<div class="form-group">
			{{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
		</div>

		@if (Session::has('flash_message'))
		<div class="form-group">
			<p>{{ Session::get('flash_message') }}</p>
		</div>
		@endif

	{{ Form::close() }}



@stop