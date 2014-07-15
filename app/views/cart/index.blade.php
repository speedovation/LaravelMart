{{ HTML::style('assets/css/sliders.css') }}
<!--<link rel="stylesheet" href="dist/css/components/sliders.css">-->
<style>

#wrapper {
    padding: 20px;
}

p,h3,h4,pre {
    text-align: left;
    max-width: 540px;
    margin: 0 auto 20px;
}

.rslides {
    margin: 0 auto 40px;
}

#slider2,
#slider3 {
    box-shadow: none;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    margin: 0 auto;
}

.rslides_tabs {
    list-style: none;
    padding: 0;
    background: rgba(0,0,0,.05);
    /*box-shadow: 0 0 1px rgba(255,255,255,.3), inset 0 0 5px rgba(0,0,0,1.0);*/
    /*-moz-box-shadow: 0 0 1px rgba(255,255,255,.3), inset 0 0 5px rgba(0,0,0,1.0);*/
    /*-webkit-box-shadow: 0 0 1px rgba(255,255,255,.3), inset 0 0 5px rgba(0,0,0,1.0);*/
    font-size: 18px;
    list-style: none;
    margin: 0 auto 50px;
    /*max-width: 540px;*/
    padding: 10px 0;
    text-align: center;
    width: 100%;
}

.rslides_tabs li {
    display: inline-block;
    float: none;
    margin-right: 20px;
    padding: 10px 20px;
    color: #666 !important;
}

.rslides_tabs a {
    width: auto;
    line-height: 20px;
    padding: 9px 20px;
    height: auto;
    background: transparent;
    display: inline;
}

.rslides_tabs li:first-child {
    margin-left: 0;
}
.rslides_tabs li h3
{
    color: #666666;
}

.rslides_tabs .rslides_here , .rslides_tabs .rslides_here h3{
    background: #fff;
    color: #444 !important;
    /*font-weight: bold;*/
}

.rslides_tabs .rslides_here
{
    border-top: 4px #f13f3b solid;
}

#download {
    background: #333;
    background: rgba(255,255,255,.1);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    display: block;
    font-size: 20px;
    font-weight: bold;
    margin: 60px auto;
    max-width: 500px;
    padding: 20px;
}

#download:hover {
    background: rgba(255,255,255,.15);
}

.footer {
    font-size: 11px;
}

/* Callback example */


.events {
    list-style: none;
}

.callbacks_container {
    margin-bottom: 50px;
    position: relative;
    float: left;
    width: 100%;
}

.callbacks {
    position: relative;
    list-style: none;
    overflow: hidden;
    width: 100%;
    padding: 0;
    margin: 0;
}

.callbacks li {
    position: absolute;
    width: 100%;
    left: 0;
    top: 0;
}

.callbacks img {
    display: block;
    position: relative;
    z-index: 1;
    height: auto;
    width: 100%;
    border: 0;
}

.callbacks .caption {
    display: block;
    position: absolute;
    z-index: 2;
    font-size: 20px;
    text-shadow: none;
    color: #fff;
    background: #000;
    background: rgba(0,0,0, .8);
    left: 0;
    right: 0;
    bottom: 0;
    padding: 10px 20px;
    margin: 0;
    max-width: none;
}

.callbacks_nav {
    position: absolute;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    top: 52%;
    left: 0;
    opacity: 0.7;
    z-index: 3;
    text-indent: -9999px;
    overflow: hidden;
    text-decoration: none;
    height: 61px;
    width: 38px;
    background: transparent url("dist/img/sliders/themes.gif") no-repeat left top;
    margin-top: -45px;
}

.callbacks_nav:active {
    opacity: 1.0;
}

.callbacks_nav.next {
    left: auto;
    background-position: right top;
    right: 0;
}

#slider3-pager a {
    display: inline-block;
}

#slider3-pager img {
    float: left;
}

#slider3-pager .rslides_here a {
    background: transparent;
    /*box-shadow: 0 0 0 2px #666;*/
}

#slider3-pager a {
    padding: 0;
}

@media screen and (max-width: 600px) {
    h1 {
    }
    .callbacks_nav {
        top: 47%;
    }
}




</style>
{{ HTML::script('assets/js/sliders.js') }}
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
        <li><a href="#"> {{ HTML::image('assets/img/banners/banner-1.jpg') }}  </a>     </li>
        <li><a href="#"> {{ HTML::image('assets/img/banners/banner-2.jpg') }}  </a>     </li>
        <li><a href="#"> {{ HTML::image('assets/img/banners/banner-3.jpg') }}  </a>     </li>
    </ul>

    <ul id="slider3-pager">

        <li class="">
            <a href="#">
                <div class="col-8">
                    <h3>Magic Masala Treat</h3>
                    <p>Find out more</p>
                </div>
                <div class="col-4">
                    {{ HTML::image('assets/img/banners/thumbs/thumbnail-1.png') }}
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
                    {{ HTML::image('assets/img/banners/thumbs/thumbnail-2.png') }}
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
                    {{ HTML::image('assets/img/banners/thumbs/thumbnail-3.png') }}
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
            {{ HTML::image('assets/img/banners/thumbs/thumbnail-1.png','',['class'=>'float-left']) }}
        </div>

        <div class="col-9">
            <p>Lorem ispum random description of the product</p>
            <p><a href="/">Learn More</a></p>
        </div>

    </div>
    <div class="col-4">

        <h3>Featured Product Two</h3>
        <div class="col-3">
            {{ HTML::image('assets/img/banners/thumbs/thumbnail-2.png','',['class'=>'float-left']) }}
        </div>

        <div class="col-9">
            <p>Lorem ispum random description of the product</p>
            <p><a href="/">Learn More</a></p>
        </div>

    </div>
    <div class="col-4">

        <h3>Featured Product Three</h3>
        <div class="col-3">
            {{ HTML::image('assets/img/banners/thumbs/thumbnail-3.png','',['class'=>'float-left']) }}
        </div>

        <div class="col-9">
            <p>Lorem ispum random description of the product</p>
            <p><a href="/">Learn More</a></p>
        </div>

    </div>





</div>


