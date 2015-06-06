<!DOCTYPE html>
<html lang="en" ng-app='app'>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>LaraCommerce - @yield('title')</title>
    
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">
    
        
    <link href="{{  elixir('assets/css/all.css') }}" media="all" rel="stylesheet" />
    
    <script src="{{  elixir('assets/js/all.js') }}"></script>
    
    
    
</head>

<body ng-controller="main">
    
    @include("layouts/header")
    
    <div class="container grid">
        @yield('content')
        
        @include("layouts/footer")
        
    </div>
    
    
</body>
</html>
