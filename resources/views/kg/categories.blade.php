@extends('kblayouts.main')

@section('title', $title)



@section('content')


<section class="section ">
    
    <div class="row categories-wrap">
        
        <hr />
        <h1> {!! $title !!}</h1>
    </div>
    
    
    
    <div class="row categories-wrap text-center">
        
        
        @foreach($categories as $category)
        
        <div class="col-3 category-box">
            <i class="material-icons md-64">{!!$category->icon!!}</i>
            <h3> {{ $category->name }}</h3>
            <p>{{ $category->name }}</p>
        </div>
        
        @endforeach
        
        
        
        
        
        
        
    </div>
    
</section>

@endsection
