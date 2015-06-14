@extends('layouts.main')

@section('title', 'Registration')

@section('content')

{!! Form::open(array('url'=>'users/create', 'class'=>'row', 'role'=>'form')) !!}

<h2 class="form-signup-heading">Sign up</h2>

@if(Session::has('message'))
<span class="strong">{!! Session::get('message') !!}:</span>

<ul class="message message-danger large">
    @foreach($errors->all() as $error)
    <li>{!! $error !!}</li>
    @endforeach
</ul>
@endif

<div class="form-group">
    {!! Form::text('email', null, array('class'=>'input col-12', 'placeholder'=>'Email Address')) !!}
</div>
<div class="form-group">
    {!! Form::password('password', array('class'=>'input col-12', 'placeholder'=>'Password')) !!}
</div>
<div class="form-group">
    {!! Form::password('password_confirmation', array('class'=>'input col-12', 'placeholder'=>'Confirm Password')) !!}
</div>
<div class="form-group">
    {!! Form::submit('Sign up', array('class'=>'button positive'))!!}
    {!! Form::close() !!}
</div>

@endsection
