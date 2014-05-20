@extends('master')

@section('content')
	<h1>Edit Profile</h1>

	@if (Session::has('flash_message'))
		<div class="form-group">
			<p>{{ Session::get('flash_message') }}</p>
		</div>
	@endif

	{{ Form::model($user, ['method' => 'PATCH', 'route' => ['profiles.update', 1]]) }}

		<!-- email Field -->
		<div class="form-group">
			{{ Form::label('email', 'Email:') }}
			{{ Form::email('email', null, ['class' => 'form-control']) }}
			{{ errors_for('email', $errors) }}
		</div>


		<!-- first_name Field -->
		<div class="form-group">
			{{ Form::label('first_name', 'First Name:') }}
			{{ Form::text('first_name', null, ['class' => 'form-control']) }}
			{{ errors_for('first_name', $errors) }}
		</div>

		<!-- last_name Field -->
		<div class="form-group">
			{{ Form::label('last_name', 'Last Name:') }}
			{{ Form::text('last_name', null, ['class' => 'form-control']) }}
			{{ errors_for('last_name', $errors) }}

		</div>

		<!-- Password field -->
		<div class="form-group">
			{{ Form::label('password', 'Password: (leave blank to NOT change)') }}
			{{ Form::password('password', ['class' => 'form-control']) }}
			{{ errors_for('password', $errors) }}
		</div>

		<!-- Password Confirmation field -->
		<div class="form-group">
			{{ Form::label('password_confirmation', 'Repeat Password:') }}
			{{ Form::password('password_confirmation', ['class' => 'form-control'] )}}
		</div>





		<!-- Update Profile Field -->
		<div class="form-group">
			{{ Form::submit('Update Profile', ['class' => 'btn btn-primary']) }}
		</div>
	{{ Form::close() }}

@stop