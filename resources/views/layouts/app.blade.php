<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>STEP | @yield('title','HOME')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    <script src="https://kit.fontawesome.com/673dcd33bb.js" crossorigin="anonymous"></script>
</head>
<body>
    
@include('header')
    
<!-- <div class="l-main"> -->

@if (session('flash_message'))
    <div class="alert alert-primary text-center" role="alert">
        {{ session('flash_message') }}
    </div>
@endif
    
@yield('content')

<!-- </div> -->

@include('footer')

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
