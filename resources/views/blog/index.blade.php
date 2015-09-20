@extends('layouts.main')

@section('title', 'Homepage Title')



@section('content')




<div class="row">
    
    
    <h1>
        Latest KB Entries
    </h1>
    
    
    @foreach ($pages as $page)
    <div class=" col-6">
        <div class="panel panel-box panel-box-default blog-box">
            <h2 class="kilo"> <a href="/kb/{{$page->url}}"> {{$page->title}} </a> </h2>
            <span class="text-small blog-info"> Author: {{$page->author}} | Date : {{$page->created_at->format('F d, Y')}} </span>
            <div>
                {!! clean_div(limit_words($page->body,200)) !!}
                <a href="/kb/{{$page->url}}" class="button button-royal button-rounded read-more">Read More</a>
            </div>
        </div>
    </div>
    @endforeach
    
    
    
    
</div>




@endsection
