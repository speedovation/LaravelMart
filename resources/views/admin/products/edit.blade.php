@extends('layouts.main')

@section('Title','Create')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($product, ['route' => ['admin.products.update', $product->id], 'method' => 'patch']) !!}

        @include('admin.products.fields')

    {!! Form::close() !!}
</div>
@endsection
