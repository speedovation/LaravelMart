<div class="row">

    <div class="col-md-7">

        {{ Form::open(array('url'=>'users/create', 'class'=>'form-signup', 'role'=>'form')) }}
        <h2 class="form-signup-heading">Please Register</h2>

        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <!--<div class="form-group">
            {{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'First Name')) }}
        </div>
        <div class="form-group"> 
            {{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Last Name')) }}
        </div>-->
        <div class="form-group">
            {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
        </div>
        <div class="form-group">
            {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
        </div>   
        <div class="form-group">
            {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Register', array('class'=>'btn btn-lg btn-primary'))}}
            {{ Form::close() }}
        </div>

    </div>

</div>