@extends('layouts.main')

@section('title', 'Password forget')

@section('content')

{!! Form::open(array('url'=>'users/forget','role'=>'form', 'class'=>' row')) !!}

<h2>Login</h2>

@if(Session::has('message'))
<p class="strong message message-danger">{!! Session::get('message') !!}</p>
@endif

<div class="row field">
  {!! Form::text('email', null, array('class'=>'input col-12', 'placeholder'=>'Email Address')) !!}
</div>


{!! Form::submit('Login', array('class'=>'button primary'))!!}
{!! Form::close() !!}

@endsection
