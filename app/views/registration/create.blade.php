@extends('layout')

@section('content')

	<h1>Register</h1>

	{{ Form::open(['route' => 'registration.store']) }}

		<!-- Username field -->
		<div class="form-group">
			{{ Form::label('username', 'Username: ')}}
			{{ Form::text('username', null, ['class' => 'form-control', 'required' => 'required'])}}
			{{ errors_for('username', $errors) }}
		</div>

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

		<!-- Password Confirmation field -->
		<div class="form-group">
			{{ Form::label('password_confirmation', 'Password Confirm: ')}}
			{{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required'])}}

		</div>

		<!-- Submit field -->
		<div class="form-group">
			{{ Form::submit('Create Account', ['class' => 'btn btn-primary']) }}
		</div>

	{{ Form::close() }}

@stop