<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Authentication App With Laravel 4</title>



        <link rel="shortcut icon" href="../../assets/ico/favicon.png">

        <title>Theme Template for Bootstrap</title>

        <?= stylesheet_link_tag() ?>
        <?= javascript_include_tag() ?>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        {{ HTML::script('js/html5shiv.js') }}
        {{ HTML::script('js/respond.min.js') }}
        <![endif]-->


        <!--    For  Multi select-->


        <!--   Validation    -->
        <? // Asset::css(array('validate.css')) ?>
        <? // Asset::js(array('jquery.validate.js', 'validate.js')); ?>    





    </head>

    <body>



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
                    <li class="active"><a href="#">Link</a></li>
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
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @if(!Auth::check())
                            <li>{{ HTML::link('users/register', 'Register') }}</li>   
                            <li>{{ HTML::link('users/login', 'Login') }}</li>   
                            @else
                            <li>{{ HTML::link('users/logout', 'logout') }}</li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>


                    

        <div class="container">
            @if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
            @endif

            {{ $content }}
        </div>









    </body>
</html>