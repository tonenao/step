@extends('layouts.app')

@section('title','MYPAGE')

@section('content')
<div id="app">
  <div class="l-main-top">
    <div class="c-container p-container-top">

      <div class="c-container-title-wrap">
          <h2 class="c-container-title">{{ __('チャレンジ中STEP') }}</h2>
      </div>

      <div class="c-container-body">
        <div class="c-panel-wrap">

          <my-challenge-component></my-challenge-component>


        </div>
      </div>
    </div>
  </div>

  <div class="l-main">
    <div class="c-container">

      <div class="c-container-title-wrap">
          <h2 class="c-container-title">{{ __('登録したSTEP') }}</h2>
      </div>
      <div class="c-container-body">
          
        <div class="c-panel-wrap">
          
          
            <my-step-component></my-step-component>

        </div>
      </div>
    </div>
  </div>
</div>



@endsection