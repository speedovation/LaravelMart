@extends('kblayouts.main')

@section('title', 'Homepage Title')



@section('content')


<section class="section">

    <div class="row">
        
        <h1>
            Latest KB Entries
        </h1>
        
        
        @foreach ($pages as $page)
        <div class=" col-12">
            <div class="panel panel-box panel-box-default blog-box">
                <h2 class="kilo"> <a href="/kb/{{$page->url}}"> {{$page->title}} </a> </h2>
                <span class="text-small blog-info"> Author: {{$page->author}} | Date : {{$page->created_at->format('F d, Y')}} </span>
                <div>
                    {!! limit_words($page->body,600) !!}
                    <a href="/kb/{{$page->url}}" class="button button-royal read-more">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
        
        
        
    </div>
    
    <div class="row">
        {!! $pages->render() !!}
    </div>

</section>


@endsection
