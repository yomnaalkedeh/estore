<!doctype html>
<html class="no-js" lang="en">

<head>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}" type="image/png">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{asset('assets/css/LineIcons.css')}}">

    <!--====== Material Design Icons CSS ======-->
    <link rel="stylesheet" href="{{asset('assets/css/materialdesignicons.min.css')}}">

    <!--====== Jquery Ui CSS ======-->
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}">

    <!--====== nice select CSS ======-->
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{asset('assets/css/default.css')}}">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @yield('styles')
</head>

<body>
    @yield('content')


    @yield('scripts')
</body>

</html>



