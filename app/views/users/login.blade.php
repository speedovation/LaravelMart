{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
	<h2 class="form-signin-heading">Please Login</h2>

	{{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
	{{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}

	{{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}