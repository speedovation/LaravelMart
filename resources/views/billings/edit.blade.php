@extends('layouts.main')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($billing, ['route' => ['billings.update', $billing->id], 'method' => 'patch']) !!}

        @include('billings.fields')

    {!! Form::close() !!}
</div>
@endsection
