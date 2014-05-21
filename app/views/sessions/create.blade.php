@extends('master')

@section('title', 'Login')

@section('content')


	<div class="container">
	    <div class="row">
			<div class="col-md-6 col-md-offset-3">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Login</h3>
				 	</div>
				  	<div class="panel-body">
				    	{{ Form::open(['route' => 'sessions.store']) }}
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

				    		<div class="checkbox">
				    	    	<!-- Remember me field -->
								<div class="form-group">
									{{ Form::label('remember', 'Remember Me? ')}}
									{{ Form::checkbox('remember', 'remember') }}
								</div>
				    	    </div>

				    		<!-- Submit field -->
							<div class="form-group">
								{{ Form::submit('Login', ['class' => 'btn btn btn-lg btn-success btn-block']) }}
							</div>
				    	</fieldset>
				      	{{ Form::close() }}
				    </div>
				</div>
				<div style="text-align:center">
					<p><a href="/forgot_password">Forgot Password?</a></p>

					<p><strong>Standard User:</strong> user@user.com<br>
					<strong>Standard User Password:</strong> sentryuser</p>

					<p><strong>Admin User:</strong> admin@admin.com<br>
					<strong>Admin Password:</strong> sentryadmin</p>
				</div>


			</div>
		</div>
	</div>

@stop