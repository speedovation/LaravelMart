@extends('layouts.main')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'billings.store']) !!}

        @include('billings.fields')

    {!! Form::close() !!}
</div>
@endsection
