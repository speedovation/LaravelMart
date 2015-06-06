@extends('layouts.main')

@section('title', 'Homepage Title')



@section('content')


<script>
    // You can also use "$(window).load(function() {"
    $(function () {

        // Slideshow 3
        $("#slider3").responsiveSlides({
            manualControls: '#slider3-pager',
            speed: 2500,
            pager: true,
            nav: false
//            namespace: "callbacks"
//            maxwidth: 840
        });
    });
</script>

<div class="row">
    <div class="col-md-12">
        <h1>
            Wow Masalas
        </h1>
    </div>
</div>
<div class="row">

    <ul id="slider3">
        <li><a href="#"> {!! Html::image('assets/img/banners/banner-1.jpg') !!}  </a>     </li>
        <li><a href="#"> {!! Html::image('assets/img/banners/banner-2.jpg') !!}  </a>     </li>
        <li><a href="#"> {!! Html::image('assets/img/banners/banner-3.jpg') !!}  </a>     </li>
    </ul>

    <ul id="slider3-pager">

        <li class="">
            <a href="#">
                <div class="col-8">
                    <h3>Magic Masala Treat</h3>
                    <p>Find out more</p>
                </div>
                <div class="col-4">
                    {!! Html::image('assets/img/banners/thumbs/thumbnail-1.png') !!}
                </div>
            </a>
        </li>

        <li class="">
            <a href="#">
                <div class="col-8">
                    <h3>Magic Masala Treat</h3>
                    <p>Find out more</p>
                </div>
                <div class="col-4">
                    {!! Html::image('assets/img/banners/thumbs/thumbnail-2.png') !!}
                </div>
            </a>
        </li>

        <li class="">
            <a href="#">
                <div class="col-8">
                    <h3>Magic Masala Treat</h3>
                    <p>Find out more</p>
                </div>
                <div class="col-4">
                    {!! Html::image('assets/img/banners/thumbs/thumbnail-3.png') !!}
                </div>
            </a>
        </li>


    </ul>

</div>



<div class="row wrap">
    <hr/>

    <div class="col-4">

        <h3>Featured Product One</h3>
        <div class="col-3">
            {!! Html::image('assets/img/banners/thumbs/thumbnail-1.png','',['class'=>'float-left']) !!}
        </div>

        <div class="col-9">
            <p>Lorem ispum random description of the product</p>
            <p><a href="/">Learn More</a></p>
        </div>

    </div>
    <div class="col-4">

        <h3>Featured Product Two</h3>
        <div class="col-3">
            {!! Html::image('assets/img/banners/thumbs/thumbnail-2.png','',['class'=>'float-left']) !!}
        </div>

        <div class="col-9">
            <p>Lorem ispum random description of the product</p>
            <p><a href="/">Learn More</a></p>
        </div>

    </div>
    <div class="col-4">

        <h3>Featured Product Three</h3>
        <div class="col-3">
            {!! Html::image('assets/img/banners/thumbs/thumbnail-3.png','',['class'=>'float-left']) !!}
        </div>

        <div class="col-9">
            <p>Lorem ispum random description of the product</p>
            <p><a href="/">Learn More</a></p>
        </div>

    </div>





</div>

@endsection
