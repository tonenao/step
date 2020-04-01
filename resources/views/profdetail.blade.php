@extends('layouts.app')

@section('title','PROFILE-DETAIL')

@section('content')
<div id="app">
  <div class="l-main-top">
    <div class="c-container p-container-top">
      <div class="c-container-title-wrap">
          <h2 class="c-container-title">{{ $user->name }}</h2>
      </div>
      <div class="c-container-body">
        <div class="c-img-prof p-prof-edit">
            @if(is_null($user->pic))
              <img src="{{asset('img/no-profile-image.png')}}">
            @else
              {{ $user->pic }}
            @endif
        </div>
        <div class="p-prof-description">
        {{ $user->introduction }}
        </div>
      </div>
    </div>
  </div>

  <div class="l-main">
    <div class="c-container">
      <div class="c-container-title-wrap">
          <h2 class="c-container-title">公開中のSTEP</h2>
      </div>

      <div class="c-container-detail">
        <h2>公開中のSTEP</h2>
        <span class="c-step-count">4</span><span class="c-step-unit">STEP</span>
        <h2>Challenge中の人数</h2>
        <span class="c-step-count">40</span><span class="c-step-unit">人</span>
        <h2>Challenge済みの人数</h2>
        <span class="c-step-count">40</span><span class="c-step-unit">人</span>
      </div>



      <div class="c-container-body">
        <div class="c-panel-wrap">


          <div class="c-panel p-panel-step">
            <a href="#">
              <h3 class="c-panel-title">最短で学んだ私の英語学習方法</h3>
              <span class="c-category">英語学習</span>
              <div class="c-panel-bar p-panel-bar-mystep">
                <span class="c-panel-bar-info">Challenging!!</span>
                <span class="c-panel-bar-val-sm">人</span>
                <span class="c-panel-bar-val">10</span>
              </div>
              <div class="c-panel-bar p-panel-bar-mystep">
                <span class="c-panel-bar-info">Done!!</span>
                <span class="c-panel-bar-val-sm">人</span>
                <span class="c-panel-bar-val">10</span>
              </div>
            </a>
          </div>

          <div class="c-panel p-panel-step">
            <a href="#">
              <h3 class="c-panel-title">最短で学んだ私の英語学習方法</h3>
              <span class="c-category">英語学習</span>
              <div class="c-panel-bar p-panel-bar-mystep">
                <span class="c-panel-bar-info">Challenging!!</span>
                <span class="c-panel-bar-val-sm">人</span>
                <span class="c-panel-bar-val">10</span>
              </div>
              <div class="c-panel-bar p-panel-bar-mystep">
                <span class="c-panel-bar-info">Done!!</span>
                <span class="c-panel-bar-val-sm">人</span>
                <span class="c-panel-bar-val">10</span>
              </div>
            </a>
          </div>

          <div class="c-panel p-panel-step">
            <a href="#">
              <h3 class="c-panel-title">最短で学んだ私の英語学習方法</h3>
              <span class="c-category">英語学習</span>
              <div class="c-panel-bar p-panel-bar-mystep">
                <span class="c-panel-bar-info">Challenging!!</span>
                <span class="c-panel-bar-val-sm">人</span>
                <span class="c-panel-bar-val">10</span>
              </div>
              <div class="c-panel-bar p-panel-bar-mystep">
                <span class="c-panel-bar-info">Done!!</span>
                <span class="c-panel-bar-val-sm">人</span>
                <span class="c-panel-bar-val">10</span>
              </div>
            </a>
          </div>

          <div class="c-panel p-panel-step p-panel-step-done">
            <a href="#">
              <span class="c-panel-badge"><i class="fas fa-check"></i></span>
              <h3 class="c-panel-title">最短で学んだ私の英語学習方法</h3>
              <span class="c-category">英語学習</span>
              <div class="c-panel-bar p-panel-bar-mystep">
                <span class="c-panel-bar-info">Challenging!!</span>
                <span class="c-panel-bar-val-sm">人</span>
                <span class="c-panel-bar-val">10</span>
              </div>
              <div class="c-panel-bar p-panel-bar-mystep">
                <span class="c-panel-bar-info">Done!!</span>
                <span class="c-panel-bar-val-sm">人</span>
                <span class="c-panel-bar-val">10</span>
              </div>
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection