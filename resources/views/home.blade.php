@extends('layouts.app')

@section('title','HOME')

@section('content')
<div id="app">
  <div class="l-main-top">
    <div class="c-container  p-container-top">

      <div class="c-container-title-wrap">
          <h2 class="c-container-title">人気STEP一覧</h2>
      </div>
      <div class="c-container-body">
        <div class="c-panel-wrap">

          <favorite-step-component></favorite-step-component>
          
        </div>
      </div>
    </div>
  </div>

  <div class="l-main">
    <div class="c-container">

      <div class="c-container-title-wrap">
          <h2 class="c-container-title">STEP一覧</h2>
      </div>
      
      <div class="c-container-body">
          

        <div class="c-panel-wrap">


          <home-step-component></home-step-component>



        </div>

      </div>
    </div>
  </div>
</div>



@endsection