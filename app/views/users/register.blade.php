{{ Form::open(array('url'=>'users/create', 'class'=>'form-signup')) }}
	<h2 class="form-signup-heading">Please Register</h2>

	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>

	{{ Form::text('firstname', null, array('class'=>'input-block-level', 'placeholder'=>'First Name')) }}
	{{ Form::text('lastname', null, array('class'=>'input-block-level', 'placeholder'=>'Last Name')) }}
	{{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
	{{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
	{{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm Password')) }}

	{{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}