@extends('kblayouts.main')

@section('title', $title)



@section('content')






<div class="row wrap">
    <hr/>

    <h1> {!! $title !!}</h1>

            @foreach($categories as $category)
            
                <div class="col-3">
                    <h3> {{ $category->name }}</h3>
                    <i class="material-icons md-64">{!!$category->icon!!}</i>
                    <p>{{ $category->name }}</p>
                </div>
                
            @endforeach

    





</div>

@endsection
