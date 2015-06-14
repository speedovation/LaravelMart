@extends('layouts.main')

@section('title', 'Reset Password')

@section('content')

{!! Form::open(array('url'=>url('/password/reset'), 'class'=>'row', 'role'=>'form')) !!}

<h2>Reset Password</h2>

@if(Session::has('message'))
<span class="strong">{!! Session::get('message') !!}:</span>

<ul class="message message-danger large">
    @foreach($errors->all() as $error)
    <li>{!! $error !!}</li>
    @endforeach
</ul>
@endif

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="token" value="{{ $token }}">

<div class="row field">
    {!! Form::text('email', old('email'), array('class'=>'input col-12', 'placeholder'=>'Email Address')) !!}
</div>

<div class="row field">
    {!! Form::password('password',  array('class'=>'input col-12', 'placeholder'=>'Password')) !!}
</div>
<div class="row field">
    {!! Form::password('password_confirmation', array('class'=>'input col-12', 'placeholder'=>'Confirm Password')) !!}
</div>



{!! Form::submit('Reset Password', array('class'=>'button primary'))!!}
{!! Form::close() !!}

@endsection

