<!DOCTYPE html>
<html lang="en" ng-app='app'>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>LaravelMart Admin - @yield('title')</title>
    
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">
    
        
    <link href="{{  elixir('assets/css/all.css') }}" media="all" rel="stylesheet" />
    
    <script src="{{  elixir('assets/js/all.js') }}"></script>
    
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    
</head>

<body ng-controller="main">
    
    @include("admin/common/header")
    
    @yield('content')
        
    @include("admin/common/footer")
    
</body>
</html>
