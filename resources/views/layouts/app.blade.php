<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>STEP | @yield('title','HOME')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@500;700;800;900&family=Orbitron&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/673dcd33bb.js" crossorigin="anonymous"></script>
    <script src="https://www.promisejs.org/polyfills/promise-6.1.0.min.js"></script>

</head>
<body>
    
@include('header')
    
<!-- <div class="l-main"> -->

<!-- @if (session('flash_message'))
    <div class="c-flash-message" id="js-show-msg" role="alert">
        {{ session('flash_message') }}
    </div>
@endif -->
    
@yield('content')

<!-- </div> -->

@include('footer')

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
