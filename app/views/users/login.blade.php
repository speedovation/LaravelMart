<h2 class="form-signin-heading">Please Login</h2>

 @if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
            @endif
            
            
{{ Form::open(array('url'=>'users/signin','role'=>'form', 'class'=>' form-signin')) }}

  <div class="row field">
    <label class="sr-only" for="exampleInputEmail2">Email address</label>
    {{ Form::text('email', null, array('class'=>'input', 'placeholder'=>'Email Address')) }}
  </div>
  <div class="row field">
    <label class="sr-only" for="exampleInputPassword2">Password</label>
    {{ Form::password('password', array('class'=>'input', 'placeholder'=>'Password')) }}
    </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Remember me
    </label>
  </div>
  {{ Form::submit('Login', array('class'=>'btn btn-default btn-lg'))}}
 {{ Form::close() }} 

