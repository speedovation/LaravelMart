<h2 class="form-signin-heading">Please Login</h2>

{{ Form::open(array('url'=>'users/signin','role'=>'form', 'class'=>' form-signin')) }}

  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail2">Email address</label>
    {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword2">Password</label>
    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
    </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Remember me
    </label>
  </div>
  {{ Form::submit('Login', array('class'=>'btn btn-default btn-lg'))}}
 {{ Form::close() }} 

