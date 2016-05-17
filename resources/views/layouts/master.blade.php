<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyword" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="author" content="">
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <title>{{ app_settings('name') }} - @yield('title')</title>

    @section('css')
    <!-- Bootstrap Core CSS -->
    <link href="/templates/web/business-casual/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/templates/web/business-casual/css/clean-blog.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    @show

    <link href="/css/libs.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    @include('layouts.partials.header')

    <div class="container">
        @yield('content')
    </div>
    <!-- /.container -->

    @include('layouts.partials.footer')

    @section('javascripts')
    <!-- jQuery -->
    <script src="/templates/web/business-casual/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/templates/web/business-casual/js/bootstrap.min.js"></script>

    <!-- Clean Blog -->
    <script src="/templates/web/business-casual/js/clean-blog.js"></script>

    <!-- Pagination -->
    <script src="/templates/web/business-casual/js/pagination.js"></script>
    @show

    <script src="/js/libs.js"></script>

    @yield('inline_scripts')

    @include('layouts.partials.flash')

</body>

</html>
