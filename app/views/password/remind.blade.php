@extends('master')

@section('content')
<!-- 	<form action="{{ action('RemindersController@postRemind') }}" method="POST">
	    <input type="email" name="email">
	    <input type="submit" value="Send Reminder">
	</form> -->

	{{ Form::open(['action' => 'RemindersController@postRemind']) }}

		<!-- Email field -->
		<div class="form-group">
			{{ Form::label('email', 'Email: ')}}
			{{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required'])}}
			{{ errors_for('email', $errors) }}
		</div>

		<!-- Submit field -->
		<div class="form-group">
			{{ Form::submit('Send Reminder', ['class' => 'btn btn-primary']) }}
		</div>

		@if (Session::has('flash_message'))
		<div class="form-group">
			<p>{{ Session::get('flash_message') }}</p>
		</div>
		@endif

	{{ Form::close() }}

	@if(Session::has('error'))
	    <div class="alert-box success">
	        <h2>{{ Session::get('error') }}</h2>
	    </div>
	@endif

	@if(Session::has('status'))
	    <div class="alert-box success">
	        <h2>{{ Session::get('status') }}</h2>
	    </div>
	@endif
@stop




