@extends('layouts.main')

@section('content')
<div class="row">

    @include('common.errors')

    {!! Form::open(['route' => 'billings.store']) !!}

        @include('billings.fields')
		
		

    {!! Form::close() !!}
</div>
@endsection
