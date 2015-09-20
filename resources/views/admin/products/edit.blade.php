@extends('admin.admin')

@section('Title','Create')

@section('content')


<div class="row space-top">
	
	<h1 class="desktop-3"> Edit {!! ucfirst( str_singular($table) ) !!} </h1>
	<div class="desktop-9">
         <a class="button button-inverse" style="margin-top: 10px" href="{!! route('admin.index',[$table]) !!}">Back to {!! ucfirst($table) !!}</a>
    </div>
   
</div>

<div class="row space-top">
    
    
    @include('common.errors')
    
    
    {!! Form::model($data, [ 'route' => ['admin.update', $table ,$data->id], 'method' => 'patch']) !!}
    
    @include('admin.products.fields')
    
    {!! Form::close() !!}
    
</div>

@endsection
