<!DOCTYPE html>
<html lang="en" ng-app='app'>
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

    <body ng-controller="main">

        @include("layouts/header")

        <div class="container grid">
            {{ $content }}
        </div>
        @include("layouts/footer")



    </body>
</html>