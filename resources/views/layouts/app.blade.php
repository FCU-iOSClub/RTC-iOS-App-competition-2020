<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app.name', 'Laravel')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta property="og:title" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('images/fcu.png')}}" type="image/png">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{asset('/fonts/font.css')}}" rel="stylesheet">
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <!-- Scripts -->
    @routes
    <script src="{{asset('/js/app.js')}}"></script>
    <script src="{{asset('/js/plugin.js')}}"></script>
    {{-- <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script> --}}
    {{-- <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script> --}}
    @yield('head')
</head>

<body data-stellar-background-ratio="0.6">
    <div id="app">
        <!-- Hero -->
        @yield('hero')
        <!-- Header -->
        @component('components.navbar') @endcomponent
        <!-- Content -->
        @yield('content')
        <a class="scrolltop" href="#"><span class="fas fa-angle-up"></span></a>
    </div>
</body>

</html>