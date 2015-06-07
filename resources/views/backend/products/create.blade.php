@extends('layouts.main')

@section('Title','Create')

@section('content')
<div class="row">

    @include('common.errors')

    {!! Form::open(['route' => 'manageproducts.store']) !!}

        @include('backend.products.fields')

    {!! Form::close() !!}
</div>
@endsection
