@extends('layouts.main')

@section('Title','Create')

@section('content')
<div class="row">

    @include('common.errors')

    {!! Form::open(['route' => 'admin.products.store']) !!}

        @include('admin.products.fields')

    {!! Form::close() !!}
</div>
@endsection
