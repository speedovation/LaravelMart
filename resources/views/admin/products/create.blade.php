@extends('admin.admin')

@section('Title','Create')

@section('content')
<div class="row space-top">

	<h1> Create {!! ucfirst( str_singular($table) ) !!} </h1>

    @include('common.errors')

    {!! Form::open(['url' => $url, 'class' => 'space-bottom']) !!}

        @include('admin.products.fields')

    {!! Form::close() !!}
</div>
@endsection
