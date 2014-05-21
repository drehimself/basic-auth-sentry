@extends('master')

@section('title', 'Password Reset')

@section('content')

		<div class="container">
	    <div class="row">
			<div class="col-md-6 col-md-offset-3">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Password Reminder</h3>
				 	</div>
				  	<div class="panel-body">
				    	{{ Form::open(['action' => 'RemindersController@postRemind']) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<p style="padding:5px" class="bg-success text-success">{{ Session::get('flash_message') }}</p>
							@endif

							@if (Session::has('error_message'))
								<p style="padding:5px" class="bg-danger text-danger">{{ Session::get('error_message') }}</p>
							@endif

				    	  	<!-- Email field -->
							<div class="form-group">
								{{ Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('email', $errors) }}
							</div>

				    		<!-- Submit field -->
							<div class="form-group">
								{{ Form::submit('Send Reminder', ['class' => 'btn btn btn-lg btn-primary btn-block']) }}
							</div>
				    	</fieldset>
				      	{{ Form::close() }}
				    </div>
				</div>

			</div>
		</div>
	</div>



@stop




