<!DOCTYPE html>
<html lang="en" ng-app='app'>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>LaraCommerce - @yield('title')</title>
    
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">
    
        
    <link href="{{  elixir('assets/css/all.css') }}" media="all" rel="stylesheet" />
    
    <script src="{{  elixir('assets/js/all.js') }}"></script>
    
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700|Roboto:400,300,100,700' rel='stylesheet' type='text/css'>
<!--    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>-->
</head>

<body ng-controller="main">
    
    @include("layouts/header")
    
    @yield('content')
        
    @include("layouts/footer")
    
</body>
</html>
