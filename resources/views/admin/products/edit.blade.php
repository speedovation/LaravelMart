@extends('layouts.main')

@section('Title','Create')

@section('content')

<div class="row">

     <h1>Edit {!! ucfirst( str_singular($table) ) !!}</h1>
    
	
	   @include('common.errors')
	

     {!! Form::model($data, [ 'route' => ['admin.update', $table ,$data->id], 'method' => 'patch']) !!}

        @include('admin.products.fields')

     {!! Form::close() !!}

</div>

@endsection
