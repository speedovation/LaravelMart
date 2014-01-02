@section("header1")
    <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active">
                        {{ link_to_action('ProductsController@getIndex', 'Home' ) }}
                    </li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @if(!Auth::check())
                            <li>{{ HTML::link('users/register', 'Register') }}</li>   
                            <li>{{ HTML::link('users/login', 'Login') }}</li>   
                            @else
                            <li>{{ HTML::link('users/dashboard', 'Dashboard') }}</li>
                            <li>{{ HTML::link('users/profile', 'Profile') }}</li>
                            <li>{{ HTML::link('users/logout', 'logout') }}</li>
                            @endif
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                
                <div class="navbar-form navbar-right" >
                     {{ link_to_action('CartController@getIndex', 'Cart' ) }}
                </div>
                
            </div><!-- /.navbar-collapse -->
        </nav>
@stop



@section('header')
<div class="megamenu_wrapper megamenu_light_theme"><!-- BEGIN MENU WRAPPER -->



    <div class="megamenu_container navbar navbar-default" role="navigation" ><!-- BEGIN MENU CONTAINER -->



        <ul class="megamenu"><!-- BEGIN MENU -->
           


            <li class="megamenu_button"><a href="#_">Mega Menu</a></li>

        
            <li><a href="#_" class="menuitem_drop">Home</a><!-- Begin Home Item -->
            
            
                <div class="dropdown_2columns"><!-- Begin columns container -->


                    <div class="col_full firstcolumn">            
            
                        <h2>Welcome !</h2>
                        <p>Hi and welcome here ! This is a showcase of the possibilities of this awesome Mega Drop Down Menu.</p>            
                        <p>This item comes with a large range of prepared typographic stylings such as headings, lists, <a href="http://codecanyon.net/user/Pixelworkshop/portfolio">links</a> etc.</p>                    
                        <h2 class="pusher">Cross Browser Support</h2>
                        <img src="img/browsers.png" alt="" />
                        <p>This mega menu has been tested in all major browsers.</p>
                        <h2 class="pusher">Compatible Browsers</h2>
                            
                        <div class="col_half firstcolumn">

                            <ul class="plus">
                                <li>Internet Explorer</li>
                                <li>Firefox</li>
                                <li>Opera</li>
                            </ul>

                        </div>
                            
                        <div class="col_half"> 

                            <ul class="plus">
                                <li>Chrome</li>
                                <li>Safari</li>
                                <li>What else ?</li>
                            </ul>

                        </div>

                    </div>
                    
                
                </div><!-- End columns container -->
                
            
            </li><!-- End Home Item -->
            

            
            
            <li><a href="#_" class="menuitem_drop">Typography</a><!-- Begin Typography Item -->
            
            
                <div class="dropdown_5columns"><!-- Begin columns container -->
                
                
                    <div class="col_full firstcolumn">
                    
                        <h2>This is an example of a large container with 5 columns</h2>
                    
                        <div class="col_one_fifth firstcolumn">

                            <p class="dark_grey_box">This is a dark grey box text. Fusce in metus at enim porta lacinia vitae a arcu. Sed sed lacus nulla mollis porta.</p>

                        </div>
                        
                        <div class="col_one_fifth">

                            <p>Phasellus vitae sapien ac leo mollis porta quis sit amet nisi. Mauris hendrerit, metus cursus lectus at arcu accumsan tincidunt.</p>

                        </div>
                        
                        <div class="col_one_fifth">

                            <p class="italic">This is a sample of an italic text. Consequat scelerisque. Fusce sed lectus at arcu mollis accumsan at nec nisi porta quis sit amet.</p>

                        </div>
                        
                        <div class="col_one_fifth">

                            <p>Curabitur euismod gravida ante nec commodo. Nunc dolor nulla, semper in ultricies vitae, vulputate porttitor neque.</p>

                        </div>
                        
                        <div class="col_one_fifth">

                            <p class="strong">This is a sample of a bold text. Aliquam sodales nisi nec felis hendrerit ac eleifend lectus feugiat scelerisque.</p>

                        </div>
                        
                    </div>
                
                    <div class="col_full firstcolumn">
                    
                        <h2>Here is some content with side images</h2>
                        
                        <div class="col_two_thirds firstcolumn">
                        
                            <img src="img/01.jpg" class="img_left imgshadow_light" alt="" />
                            <p>Maecenas eget eros lorem, nec pellentesque lacus quis felis consequat scelerisque. Aenean dui orci, rhoncus sit amet tristique eu, tristique sed odio. Praesent ut interdum elit. Sed in sem mauris. Aenean a commodo mi. Praesent augue lacus.<br /><a href="#">Read more...</a></p>

                            <div class="clear"></div>
                    
                            <img src="img/02.jpg" class="img_left imgshadow_light" alt="" />
                            <p>Aliquam elementum felis quis felis consequat scelerisque. Fusce sed lectus at arcu mollis accumsan at nec nisi. Aliquam pretium mollis fringilla. Nunc in leo urna vestibulum nisi non nunc blandit placerat, eget varius metus. Aliquam sodales nisi.<br /><a href="#">Read more...</a></p>
                        
                        </div>
                        
                        <div class="col_one_third">
                        
                            <p class="black_box">This is a black box, you can use it to highligh some content. Sed sed lacus nulla, et lacinia risus. Phasellus vitae sapien ac leo mollis porta quis sit amet nisi. Mauris hendrerit, metus cursus accumsan tincidunt.Quisque vestibulum nisi non nunc blandit placerat. Mauris facilisis, risus ut lobortis posuere, diam lacus congue lorem, ut condimentum ligula est vel orci. Donec interdum lacus at velit.</p>
                        
                        </div>
                        
                    </div>
                   
                
                </div><!-- End columns container -->
                
            
            </li><!-- End Typography Item -->
            
            
            
            
            <li class="menuitem_fullwidth"><a href="#_" class="menuitem_drop">Full Width</a><!-- Begin Full Width Item -->
            
            
                <div class="dropdown_fullwidth"><!-- Begin fullwidth container -->
                
                
                    <div class="col_two_thirds firstcolumn">
                    
                        <h2>This is a heading title</h2>

                        <div class="col_half firstcolumn">

                            <p class="favorite">This is a paragraph with a favorite icon. Donec tortor sem, venenatis vitae lobortis ac, cursus vel lacus. </p>
                            <p class="help">This is a paragraph with a help icon. Donec tortor sem, venenatis vitae lobortis ac, cursus vel lacus. </p>

                        </div>
                        
                        <div class="col_half">

                            <p class="mail">This is a paragraph with a mail icon. Donec tortor sem, venenatis vitae lobortis ac, cursus vel lacus. </p>
                            <p class="print">This is a paragraph with a print icon. Donec tortor sem, venenatis vitae lobortis ac, cursus vel lacus. </p>

                        </div>

                        <div class="col_one_quarter firstcolumn">
                        
                            <h3>Some Links</h3>
                            <ul>
                                <li><a href="#">ThemeForest</a></li>
                                <li><a href="#">GraphicRiver</a></li>
                                <li><a href="#">ActiveDen</a></li>
                                <li><a href="#">VideoHive</a></li>
                                <li><a href="#">3DOcean</a></li>
                            </ul>   
                             
                        </div>
                
                        <div class="col_one_quarter">
                        
                            <h3>Useful Links</h3>
                            <ul>
                                <li><a href="#">NetTuts</a></li>
                                <li><a href="#">VectorTuts</a></li>
                                <li><a href="#">PsdTuts</a></li>
                                <li><a href="#">PhotoTuts</a></li>
                                <li><a href="#">ActiveTuts</a></li>
                            </ul>   
                             
                        </div>
                
                        <div class="col_one_quarter">
                        
                            <h3>Other Stuff</h3>
                            <ul>
                                <li><a href="#">FreelanceSwitch</a></li>
                                <li><a href="#">Creattica</a></li>
                                <li><a href="#">WorkAwesome</a></li>
                                <li><a href="#">Mac Apps</a></li>
                                <li><a href="#">Web Apps</a></li>
                            </ul>   
                             
                        </div>
                
                        <div class="col_one_quarter">
                        
                            <h3>Misc</h3>
                            <ul>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Logo</a></li>
                                <li><a href="#">Flash</a></li>
                                <li><a href="#">Illustration</a></li>
                                <li><a href="#">More...</a></li>
                            </ul>   
                             
                        </div>

                    </div>

                    <div class="col_one_third">
                    
                        <h2>This is another title</h2>

                        <div class="col_half firstcolumn">

                            <p>Fusce at sapien lorem. Sed ultricies nibh blandit turpis scelerisque sit amet varius lacus pretium. Nulla nunc lectus, fermentum ut hendrerit tempus, ullamcorper eu velit.</p>
                            <p>Nunc ut nisl augue. Fusce ligula est, volutpat et pulvinar et, scelerisque at augue. Sed placerat, metus nec ultricies ullamcorper, turpis massa dapibus ante. </p>

                        </div>
                        
                        <div class="col_half">

                            <p>Curabitur ut sodales odio. Cras quis mi ac nisl euismod tempor sed a arcu. Vestibulum faucibus fermentum purus ac tempor. Maecenas ut leo quis ipsum vulputate varius. Pellentesque eget.</p>
                            <p>Maecenas eleifend adipiscing leo quis gravida. Morbi elit tortor, sodales sodales molestie ac, pharetra vel velit. Etiam massa eros, tincidunt eget luctus nec</p>

                        </div>
                        
                    </div>
                

                </div><!-- End fullwidth container -->
            

            </li><!-- End Full Width Item -->
            
            
            
            
            <li><a href="#_" class="menuitem_drop">Elements</a><!-- Begin Elements Item -->
            
            
                <div class="dropdown_3columns"><!-- Begin columns container -->
                
                    
                    <div class="col_full firstcolumn">

                        <h2>Lists in Boxes</h2>

                        <div class="col_one_third firstcolumn">
                
                            <ul class="greybox">
                                <li><a href="#">FreelanceSwitch</a></li>
                                <li><a href="#">Creattica</a></li>
                                <li><a href="#">WorkAwesome</a></li>
                                <li><a href="#">Mac Apps</a></li>
                                <li><a href="#">Web Apps</a></li>
                            </ul>   
                
                        </div>
                        
                        <div class="col_one_third">
                
                            <ul class="greybox">
                                <li><a href="#">ThemeForest</a></li>
                                <li><a href="#">GraphicRiver</a></li>
                                <li><a href="#">ActiveDen</a></li>
                                <li><a href="#">VideoHive</a></li>
                                <li><a href="#">3DOcean</a></li>
                            </ul>   
                
                        </div>
                        
                        <div class="col_one_third">
                
                            <ul class="greybox">
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Logo</a></li>
                                <li><a href="#">Flash</a></li>
                                <li><a href="#">Illustration</a></li>
                                <li><a href="#">More...</a></li>
                            </ul>   
                
                        </div>
                        
                    </div>
                    
                    <div class="col_full firstcolumn">

                        <h2 class="pusher">Here are some image examples</h2>

                        <img src="img/03.jpg" width="70" height="70" class="img_right imgshadow_light" alt="" />
                        <p>Maecenas eget eros lorem, nec pellentesque lacus. Aenean dui orci, rhoncus sit amet tristique eu, tristique sed odio. Praesent ut interdum elit. Maecenas imperdiet, nibh vitae rutrum vulputate, lorem sem condimentum.<br /><a href="#">Read more...</a></p>
            
                        <img src="img/04.jpg" width="70" height="70" class="img_left imgshadow_light" alt="" />
                        <p>Aliquam elementum felis quis felis consequat scelerisque. Fusce sed lectus at arcu mollis accumsan at nec nisi. Aliquam pretium mollis fringilla. Vestibulum tempor facilisis malesuada.<br /><a href="#">Read more...</a></p>

                    </div>
                
                
                </div><!-- End columns container -->
                
                
            </li><!-- End Elements Item -->
            
            
            
            
            <li><a href="#_" class="menuitem_drop">Lists</a><!-- Begin Lists Item -->
            
            
                <div class="dropdown_2columns"><!-- Begin columns container -->
                
                
                    <div class="col_half firstcolumn">
                    
                        <h3>Some Links</h3>
                        <ul>
                            <li><a href="#">ThemeForest</a></li>
                            <li><a href="#">GraphicRiver</a></li>
                            <li><a href="#">ActiveDen</a></li>
                            <li><a href="#">VideoHive</a></li>
                            <li><a href="#">3DOcean</a></li>
                        </ul>   
                         
                    </div>
            
                    <div class="col_half">
                    
                        <h3>Useful Links</h3>
                        <ul>
                            <li><a href="#">NetTuts</a></li>
                            <li><a href="#">VectorTuts</a></li>
                            <li><a href="#">PsdTuts</a></li>
                            <li><a href="#">PhotoTuts</a></li>
                            <li><a href="#">ActiveTuts</a></li>
                        </ul>   
                         
                    </div>
            
                    <div class="col_half firstcolumn">
                    
                        <h3>Other Stuff</h3>
                        <ul>
                            <li><a href="#">FreelanceSwitch</a></li>
                            <li><a href="#">Creattica</a></li>
                            <li><a href="#">WorkAwesome</a></li>
                            <li><a href="#">Mac Apps</a></li>
                            <li><a href="#">Web Apps</a></li>
                        </ul>   
                         
                    </div>
            
                    <div class="col_half">
                    
                        <h3>Misc</h3>
                        <ul>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Logo</a></li>
                            <li><a href="#">Flash</a></li>
                            <li><a href="#">Illustration</a></li>
                            <li><a href="#">More...</a></li>
                        </ul>   
                         
                    </div>
                    
                
                </div><!-- End columns container -->
                
            
            </li><!-- Begin Lists Item -->
            
            
            
            
            <li><a href="#_" class="menuitem_drop">Drop Down</a><!-- Begin Drop Down Item -->
            
            
                <div class="dropdown_1column dropdown_flyout"><!-- Begin columns container -->
                
                    
                    <ul class="levels">
                    
                        <li><a href="#">FreelanceSwitch</a></li>
                        
                        <li><a href="#" class="parent">Creattica</a>

                            <ul>
                                <li><a href="#">This is a</a></li>
                                <li><a href="#">Second Level</a></li>
                                <li><a href="#">Submenu</a></li>
                            </ul>

                        </li>
                        
                        <li><a href="#">WorkAwesome</a></li>
                        
                        <li><a href="#">Mac Apps</a></li>
                        
                        <li><a href="#" class="parent">Web Apps</a>

                            <ul>
                                <li><a href="#">Another</a></li>
                                <li><a href="#" class="parent">Drop Down</a>

                                    <ul>
                                        <li><a href="#">This is a</a></li>
                                        <li><a href="#">Second</a></li>
                                        <li><a href="#">Level</a></li>
                                        <li><a href="#">Submenu</a></li>
                                    </ul>

                                </li>
                                <li><a href="#">Menu</a></li>
                            </ul>

                        </li>
                        
                        <li><a href="#">NetTuts</a></li>
                        
                        <li><a href="#" class="parent">VectorTuts</a>

                            <ul>
                                <li><a href="#">Put anything</a></li>
                                <li><a href="#">You want</a></li>
                                <li><a href="#" class="parent">Here</a>

                                    <ul>
                                        <li><a href="#">Unlimited</a></li>
                                        <li><a href="#">Possibilities</a></li>
                                        <li><a href="#">With this</a></li>
                                        <li><a href="#">Mega Menu</a></li>
                                    </ul>

                                </li>
                            </ul>

                        </li>
                        
                        <li><a href="#">PsdTuts</a></li>
                        <li><a href="#">PhotoTuts</a></li>
                        <li><a href="#">ActiveTuts</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Logo</a></li>
                        <li><a href="#">Flash</a></li>
                        <li><a href="#">Illustration</a></li>
                        <li><a href="#">More...</a></li>
                        
                    </ul>   
                    
                
                </div><!-- End columns container -->
                
            
            </li><!-- End Drop Down Item -->
        
        


            <li class="menuitem_nodrop"><a href="http://codecanyon.net/user/Pixelworkshop/portfolio">Link</a></li><!-- No Drop Down Item -->


        
        
            <li class="menuitem_right"><a href="#_" class="menuitem_drop">Contact</a><!-- Begin Contact Item -->
                
                
                <div class="dropdown_2columns dropdown_right"><!-- Begin right aligned columns container -->
            
                    
                    <h2>Contact Us</h2>

                    <p>Please fill in the following form to contact us</p>

                    <div class="contact_form">
                    
                        <div class="message">
                            <div id="alert"></div>
                        </div>
                        
                        <form method="post" action="js/sendmail.php" id="contactForm">
                        
                            <label for="name">Name<span class="required"> *</span></label>
                            <input name="name" type="text" id="name" /> 
                            
                            <br />
                            <label for="email">Email<span class="required"> *</span></label>
                            <input name="email" type="text" id="email" />
                            
                            <br />
                            <label for="message">Message<span class="required"> *</span></label>
                            <textarea name="message" cols="40" rows="5" id="message"></textarea>
                                
                            <p class="special"><label for="last">Don't fill this in :</label><input type="text" name="last" value="" id="last" /></p>
                            
                            <div class="form_buttons">
                            <input type="submit" class="button" id="submit" value="Submit" />
                            <input type="reset" class="button" id="reset" value="Reset" />
                            </div>
                        
                        </form>
                    
                    </div>
                
                    <h2>Find us on social networks</h2>

                    <ul class="social">
                        <li><a href="#"><img src='img/twitter.png' alt="" /><span>Twitter</span></a></li>
                        <li><a href="#"><img src='img/facebook.png' alt="" /><span>Facebook</span></a></li>
                        <li><a href="#"><img src='img/flickr.png' alt="" /><span>Flickr</span></a></li>
                        <li><a href="#"><img src='img/rss.png' alt="" /><span>RSS Feed</span></a></li>
                        <li><a href="#"><img src='img/technorati.png' alt="" /><span>Technorati</span></a></li>
                        <li><a href="#"><img src='img/delicious.png' alt="" /><span>Delicious</span></a></li>
                    </ul>
                
                
                </div><!-- End right aligned columns container -->
                  
                  
            </li><!-- End Contact Item -->
    
    

        </ul><!-- END MENU -->



    </div><!-- END MENU CONTAINER -->



</div><!-- END MENU WRAPPER -->




<div class="pagecontentclear"></div>

@show