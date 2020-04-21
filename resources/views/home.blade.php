@extends('layouts.app')

@section('title','HOME')

@section('content')
<div id="app">
  <div class="l-main-top">
    <div class="p-container  p-container__top">

      <div class="c-title">
          <h2 class="c-title__word">人気STEP一覧</h2>
      </div>
      <div class="p-container p-container__body">
        <div class="p-panel__wrap">

          <favorite-step-component></favorite-step-component>
          
        </div>
      </div>
    </div>
  </div>

  <div class="l-main">
    <div class="p-container">

      <div class="c-title">
          <h2 class="c-title__word">STEP一覧</h2>
      </div>
      
      <div class="p-container p-container__body">
          

        <div class="p-panel__wrap">


          <home-step-component></home-step-component>



        </div>

      </div>
    </div>
  </div>
</div>



@endsection