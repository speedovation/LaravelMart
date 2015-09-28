@extends('kblayouts.main')

@section('title', $page->title)



@section('content')




<section class="section">

    <div class="row wrap">
        
        
         <div class="panel  blog-box single-box col-12">   
                <h2 class="kilo">  <a href="/kb/{{$page->url}}">{{$page->title}} <i class="material-icons md-32">speaker_notes</i>  </a> </h2>
                <span class="text-small blog-info"> Author: {{$page->author}} | Date : {{$page->created_at->format('F d, Y')}} </span>
                <div>
                    {!! $page->body !!} 
                    <a href="/kb" class="button button-royal read-more">Home</a>
                </div>
             </div> 
        
    
    </div>
    
</section>    

@endsection
