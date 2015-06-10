@extends('layouts.main')

@section('Title','Create')

@section('content')

<div class="row">
     <h1 class="desktop-4">Edit {!! ucfirst( str_singular($table) ) !!}</h1>
</div>

<div class="row">

    
	
	@include('common.errors')
	
	

    {!! Form::model($data, [ 'route' => ['admin.update', $table ,$data->id], 'method' => 'patch']) !!}

        @include('admin.products.fields')

    {!! Form::close() !!}
</div>

@endsection
