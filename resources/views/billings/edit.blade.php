@extends('layouts.main')

@section('content')
<div class="row">

    @include('common.errors')

    {!! Form::model($billing, ['route' => ['billings.update', $billing->id], 'method' => 'patch']) !!}

        @include('billings.fields')

    {!! Form::close() !!}
</div>
@endsection
