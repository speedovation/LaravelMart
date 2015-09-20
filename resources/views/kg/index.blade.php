@extends('kblayouts.main')

@section('title', 'Homepage Title')


@section('content')

<!--[if lt IE 7]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Header -->
<header class="dark-bg section"   id="header"    >
    <div class="row">
        
        
        <div class="large-4 desktop-4" role="navigation">
            
            <a href="/" title="Home" class="kilo" ><span class="sprite icon"></span> Kara<strong>.Guru</strong></a>
            
        </div>
        
        <div class="large-8 desktop-8" role="navigation">
            
            
            <ul class="subnav">
                <li><a href="/" title="Home">Home</a></li>
                <li><a href="/#pricing" title="Pricing">Plans and Pricing</a></li>
                <li><a href="/#welcome" title="Home">Introduction</a></li>
                <li><a href="/#how" title="Home">How it works</a></li>
                <li><a href="/#features" title="Home">Features</a></li>
                <li><a href="/#about" title="About">About</a></li>
                <li><a href="/#contact" title="Contact">Contact</a></li>
            </ul>
            
        </div>
    </div>
    <div class="row text-center info">
        
        <h2><strong>Kara<strong>.Guru</strong></strong> One Stop Solution</h2>
        
        <h3 class="search-header">Troubleshooting Windows Problems? Try Search</h3>
        
        <form id="searchform" class="text-center" method="get" action="#" autocomplete="off"
            novalidate="novalidate" _lpchecked="1">
            
            <div class="row">
                <input class="search-term width-per-20 input" type="text" id="s" name="s"
                placeholder="Type your search terms here" title="* Please enter a search term!" autocomplete="off">
                <button class="search-button button button-royal button-large button-square"> Search</button>
            </div>
            
        </form>
        
        
        <div class="row text-center header-contact-info">
            <h3 class="search-tag-line">Facing windows issues and don't have time to fix it. Don't worry contact us and we will solve it for you.</h3>
            
            <!--            <a href="http://unicorn-ui.com/" class="button button-royal button-large">Say Hi!</a>-->
            <a href="http://kara.guru/#" class="button button-royal button-large ask " title="Submit your problem">Ask Question</a> &nbsp;
            <a href="http://kara.guru/#" class="button button-caution button-large phone " title="We will provide custom solutions for windows technical problems">Contact Us</a>
        </div>
        
    </div>
    
</header>



<!-- Features -->
<section class="section features text-center">
    
    <a id="intro"></a>
    
    <div class="row">
        <div class="mobile-12 tablet-12 large-12">
            <h2 class="kilo">Get Help In Troubleshooting<strong> Windows Problems</strong></h2>
            <p>
                Don't waste your time searching internet or forums. We have single place where
                you can search or get professional help on Windows Issues / Problems.
            </p>
            <div class="divider"></div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="desktop-4 tablet-4 i">
            <i class="material-icons md-64">desktop_windows</i>
            <h2>Windows <strong>Problem Solutions</strong></h2>
            <p>Expand for free with your Dropbox, Google Drive and OneDrive accounts or use the extra free space on your hard drive.</p>
            <p><a class="button button-rounded button-raised button-royal" href="#" role="button">View details »</a></p>
        </div>
        <div class="desktop-4 tablet-4 i">
            <i class="material-icons md-64">developer_board</i>
            <h2>Windows <strong>Dedicated Articles</strong></h2>
            <p>Tips, Tricks and latest windows information related articles.</p>
            <p><a class="button button-rounded button-raised button-royal" href="#" role="button">View details »</a></p>
        </div>
        <div class="desktop-4 tablet-4 i">
            <i class="material-icons md-64">nature_people</i>
            <h2>Windows <strong>On Demand Solutions</strong></h2>
            <p>Works with all modern browsers, iOS, Android, Windows Phone, OS X, Windows, Linux, WebDAV and more.</p>
            <p><a class="button button-rounded button-raised button-royal" href="#" role="button">View details »</a></p>
        </div>
    </div>
</section>


<!-- Testimonials -->
<section class="section gray functions">
    
    
    <a id="features"></a>
    <div class="row">
        
        <h2 class="kilo text-center">Get Any Solution of <strong>Windows Related Problems</strong></h2>
        <p class="text-lead text-center">Kara.Guru is a plaftform for getting help on windows issues/problems. </p>
        
        <div class="divider"></div>
        
        <div class="col-4">
            <h3>Latest Articles</h3>
            <ul >
                <li>
                    <i class="material-icons md-64">people</i> <br>
                    <a href="">Get Any Solution</a> <br>
                    <p class="text-small text-mute">
                        <i class="material-icons md-14">today</i> 2 Sept 2015
                        <i class="material-icons md-14">person</i> Kara Team
                    </p>
                </li>
                <li>
                    <i class="material-icons md-64">people</i> <br>
                    <a href="">Get Any Solution</a> <br>
                    <i class="material-icons">today</i> 2 Sept 2015
                    <i class="material-icons">person</i> Kara Team
                    
                </li>
                <li>
                    <i class="material-icons md-64">people</i> <br>
                    <a href="">Get Any Solution</a> <br>
                    <i class="material-icons">today</i> 2 Sept 2015
                    <i class="material-icons">person</i> Kara Team
                    
                </li>
            </ul>
        </div>
        
        <div class="col-4">
            <h3>H</h3>
            <ul class="link-list">
                <li> <a href="">S</a> </li>
            </ul>
        </div>
        
        <div class="col-4">
            <h3>H</h3>
            <ul class="link-list">
                <li> <a href="">S</a> </li>
            </ul>
        </div>
        
        
        
        
        
        
        
    </div>
    
</section>


<!-- Functions -->
<section class="section text-center">
    
    <a id="how"></a>
    <div class="row">
        <h2 class="kilo">Latest <strong>Featured Articles</strong></h2>
        <p class="lead">Unlike other file sharing solutions, Kara.Guru doesn't distribute copies of your data but grants access to it instead:</p>
        <div class="divider"></div>
        
        <div class="mobile-4 desktop-4 large-4">
            <h2>Heading</h2>
            <img class="img-circle img-responsive center-block" src="http://placehold.it/240x240&amp;text=Cool" alt="image">
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="button button-rounded button-raised button-royal" href="#" role="button">View details »</a></p>
        </div>
        
        <div class="mobile-4 desktop-4 large-4">
            <h2>Heading</h2>
            <img class="img-circle img-responsive center-block" src="http://placehold.it/240x240&amp;text=Cool" alt="image">
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="button button-rounded button-raised button-royal" href="#" role="button">View details »</a></p>
        </div>
        
        <div class="mobile-4 desktop-4 large-4">
            <h2>Heading</h2>
            <img class="img-circle img-responsive center-block" src="http://placehold.it/240x240&amp;text=Cool" alt="image">
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="button button-rounded button-raised button-royal" href="#" role="button">View details »</a></p>
        </div>
        
        
        <div class=" clear clearfix"></div>
        <div class="divider"></div>
        
        <div class="mobile-4 desktop-4 large-4">
            <h2>Heading</h2>
            <img class="img-circle img-responsive center-block" src="http://placehold.it/240x240&amp;text=Cool" alt="image">
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="button button-rounded button-raised button-royal" href="#" role="button">View details »</a></p>
        </div>
        
        <div class="mobile-4 desktop-4 large-4">
            <h2>Heading</h2>
            <img class="img-circle img-responsive center-block" src="http://placehold.it/240x240&amp;text=Cool" alt="image">
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="button button-rounded button-raised button-royal" href="#" role="button">View details »</a></p>
        </div>
        
        <div class="mobile-4 desktop-4 large-4">
            <h2>Heading</h2>
            <img class="img-circle img-responsive center-block" src="http://placehold.it/240x240&amp;text=Cool" alt="image">
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="button button-rounded button-raised button-royal" href="#" role="button">View details »</a></p>
        </div>
        
        
    </div>
    
    
    
   <!--             <div class="tabs tabs-vert large-12 desktop-12 tablet-12">
                    <ul class="tab-nav js-nav">
                        <li class="tab-nav-item js-nav-item"><a href="#ex2-tab1">First tab</a></li>
                        <li class="tab-nav-item js-nav-item"><a href="#ex2-tab2">Second tab</a></li>
                        <li class="tab-nav-item js-nav-item"><a href="#ex2-tab3">Third tab</a></li>
                        <li class="tab-nav-item js-nav-item"><a href="#ex2-tab4">Fourth tab</a></li>
                    </ul>
                    <div id="ex2-tab1" class="tab-pane js-tab"><img src="http://lorempixel.com/800/250/sports/2" alt="">
                        <div class="tab-info">
                            <p>Some info about this item.<a href="#">A link</a></p>
                        </div>
                    </div>
                    <div id="ex2-tab2" class="tab-pane js-tab"><img src="http://lorempixel.com/800/250/fashion/2" alt="">
                        <div class="tab-info">
                            <p>Some info about this item<a href="#">A link</a></p>
                        </div>
                    </div>
                    <div id="ex2-tab3" class="tab-pane js-tab"><img src="http://lorempixel.com/800/250/transport/1" alt="">
                        <div class="tab-info">
                            <p>Some info about this item</p>
                        </div>
                    </div>
                    <div id="ex2-tab4" class="tab-pane js-tab"><img src="http://lorempixel.com/800/250/nature/2" alt=""></div>
                </div>
    -->
    
    
</section>



<section id="count-down" class="section about-info  text-center gray">
    <div class="row">
        <div class="counter-content">
            <div class="col-3 each-counter wow zoomIn animated" style="visibility: visible; animation-name: zoomIn;">
                <p class="icon">
                    <i class="material-icons md-64">insert_emoticon</i>
                </p>
                <span class="bigtitle count1">8637</span>
                <p class="title">Happy Clients</p>
                
            </div>
            <div class="col-3 each-counter wow zoomIn animated" style="visibility: visible; animation-name: zoomIn;">
                <p class="icon">
                    <i class="material-icons md-64">receipt</i>
                </p>
                <span class="bigtitle count2">564</span>
                <p class="title">Articles</p>
                
            </div>
            <div class="col-3 each-counter wow zoomIn animated" style="visibility: visible; animation-name: zoomIn;">
                <p class="icon">
                    <i class="material-icons md-64">question_answer</i>
                </p>
                <span class="bigtitle count3">564</span>
                <p class="title">Solutions</p>
                
            </div>
            
            <div class="col-3 each-counter wow zoomIn animated" style="visibility: visible; animation-name: zoomIn;">
                <p class="icon">
                    <i class="material-icons md-64">people</i>
                </p>
                <span class="bigtitle count3">30</span>
                <p class="title">Partners</p>
                
            </div>
        </div>
    </div> <!-- //row -->
</section>





<!-- Clients -->
<section class="section ">
    
    <a id="pricing"></a>
    
    
    
    <div class="row text-center flat">
        
        <h2 class="kilo">Membership <strong>Plans</strong></h2>
        <div class="divider"></div>
        
        <div class="desktop-8 tablet-8 mobile-12">
        
        <h2>One Plan My Plan</h2>
        <p class="text-lead">No commits. No Advance Payment.</p>
        
        </div>
        
        
        <div class="desktop-4 tablet-4 mobile-12 ">
            <ul class="plan plan2">
                <li class="plan-name">
                    Standard
                </li>
                <li class="plan-price">
                    <strong>$39</strong> / month
                </li>
                <li>
                    <strong>5GB</strong> Storage
                </li>
                <li>
                    <strong>1GB</strong> RAM
                </li>
                <li>
                    <strong>400GB</strong> Bandwidth
                </li>
                <li>
                    <strong>10</strong> Email Address
                </li>
                <li>
                    <strong>Forum</strong> Support
                </li>
                <li class="plan-action">
                    <a href="#" class="btn btn-danger btn-lg">Signup</a>
                </li>
            </ul>
        </div>
        
     </div>
    
    
    
    
    
    
    
    
</section>



<section class="section about-info gray text-center">
    
    <div class="row">
        <div class="col-3 each-part wow zoomIn animated" style="visibility: visible; animation-name: zoomIn;">
            <p class="icon">
                <i class="material-icons md-64">phone</i>
            </p>
            <p class="title">CUSTOMER CARE</p>
            <p class="mdtitle" >
                4563-52-9670
            </p>
        </div>
        <div class="col-3 each-part wow zoomIn animated" style="visibility: visible; animation-name: zoomIn;">
            <p class="icon">
                <i class="material-icons md-64">email</i>
            </p>
            <p class="title">MAIL INFO</p>
            <p class="mdtitle" >
                info@Kara.Guru
            </p>
            
        </div>
        <div class="col-3 each-part wow zoomIn animated" style="visibility: visible; animation-name: zoomIn;">
            <p class="icon">
                <i class="material-icons md-64">access_time</i>
            </p>
            <p class="title">24x7</p>
            <p class="mdtitle" >
                24x7 Available
            </p>
            
        </div>
        <div class="col-3 each-part wow zoomIn animated" style="visibility: visible; animation-name: zoomIn;">
            <p class="icon">
                <i class="material-icons md-64">business</i>
            </p>
            <p class="title">Work Place</p>
            <p class="mdtitle" >
                NY 582462, USA
            </p>
            
        </div>
    </div>
    
</section>
<!-- Footer -->
<footer id="footer">
    <div class="wrap">
        <a id="contact"></a>
        <a id="about"></a>
        <div class="row">
            <div class="mobile-12 tablet-6 desktop-4 large-4 i">
                <h2>KaraGuru</h2>
                <div class="content">
                    Address<br>
                    
                    info@Kara.Guru
                </div>
            </div>
            <div class="mobile-12 tablet-6 desktop-4 large-4 i">
                <h2>Quick Links</h2>
                <ul>
                    <li> <a href="#">Thabo Companies LLC</a> </li>
                    <li> <a href="terms.php">Terms</a> </li>
                    <li> <a href="privacy.php">Privacy Policy</a> </li>
                </ul>
                
            </div>
            
            <div class="mobile-12 tablet-6 desktop-4 large-4 i">
                <h2>About</h2>
                <p>
                    Kara.Guru is an unlimited online storage service designed for the future era.
                    It allows users to store everything, share anything and play anywhere, effectively
                    extending the storage capacity of their any devices.
                    
                </p>
                
            </div>
        </div>
        
    </div>
    
    <!-- Copyright -->
    <div class="copyright">
        
        <div class="row">
            <div class="col-6"> Copyright &copy; 2014 - All Rights Reserved  <a href="/" title="Kara.Guru">Kara.Guru</a></div>
            <div class="col-6"> Product of <a href="http://speedovation.com/">Speedovation</a> </div>
            
            
        </div>
        
    </div>
</footer>



@endsection



