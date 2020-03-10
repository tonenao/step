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
        
          <!-- @foreach($steps as $step)
            <div class="c-panel p-panel-step">
              <a href="#">
                <h3 class="c-panel-title">{{ $step->title }}</h3>
                <span class="c-category">{{ $step->category->category }}</span>
                <span class="c-panel-name">{{ $step->user->name }}</span>
                <div class="c-panel-bar">
                  <span class="c-panel-bar-info">進捗…</span>
                  <span class="c-panel-bar-val-sm">10</span>
                  <span class="c-panel-bar-val">3/</span>
                <div class="c-panel-bar-progress"></div>
                </div>
                </a>
              </div>
          @endforeach -->


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