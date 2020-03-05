@extends('layouts.app')

@section('title','TOP')

@section('content')
<div class="l-main-top">
<div class="c-hero" style="background-image: url('{{asset('img/hero.jpg')}}');">
</div>

<div class="c-container" style="min-height:1000px;">
  <div class="c-container-body">
    <div id="app">
      <example-component></example-component>
    </div>
  </div>
</div>
</div>


@endsection