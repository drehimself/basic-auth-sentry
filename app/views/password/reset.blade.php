@extends('master')

@section('title', 'Password Reset')

@section('content')

	<div class="container">
	    <div class="row">
			<div class="col-md-6 col-md-offset-3">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Reset Password</h3>
				 	</div>
				  	<div class="panel-body">
				    	{{ Form::open(['action' => 'RemindersController@postReset']) }}
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

				    		<!-- Password field -->
							<div class="form-group">
								{{ Form::password('password', ['placeholder' => 'Password','class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('password', $errors) }}
							</div>

							<!-- Password confirmation field -->
							<div class="form-group">
								{{ Form::password('password_confirmation', ['placeholder' => 'Password confirmation','class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('password', $errors) }}
							</div>

							<!-- Hidden Token field -->
							{{ Form::hidden('token', $token )}}
							{{ errors_for('email', $errors) }}



				    		<!-- Submit field -->
							<div class="form-group">
								{{ Form::submit('Reset Password', ['class' => 'btn btn btn-lg btn-primary btn-block']) }}
							</div>
				    	</fieldset>
				      	{{ Form::close() }}
				    </div>
				</div>



			</div>
		</div>
	</div>



	@if(Session::has('error'))
	    <div class="alert-box success">
	        <h2>{{ Session::get('error') }}</h2>
	    </div>
	@endif
@stop