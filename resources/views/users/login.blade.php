@extends('layouts.main')

@section('title', 'Login')


@section('content')


{!! Form::open(array('url'=>'users/signin','role'=>'form', 'class'=>' row')) !!}

<h2>Login</h2>

@if(Session::has('message'))
<p class="strong message message-danger">{!! Session::get('message') !!}</p>
@endif


<div class="row field">
  <!--    <label class="sr-only" for="exampleInputEmail2">Email address</label>-->
  {!! Form::text('email', null, array('class'=>'input col-12', 'placeholder'=>'Email Address')) !!}
</div>
<div class="row field">
  <!--    <label class="sr-only" for="exampleInputPassword2">Password</label>-->
  {!! Form::password('password', array('class'=>'input col-12', 'placeholder'=>'Password')) !!}
</div>
<!--  <div class="checkbox">  <label> <input type="checkbox"> Remember me  </label>  </div>-->

{!! Form::submit('Login', array('class'=>'button primary'))!!}
{!! Form::close() !!}

@endsection
