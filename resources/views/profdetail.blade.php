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
            <img src="/storage/img/{{ $user->pic }}">
            @endif
        </div>
        <div class="p-prof-description">
            @if(!empty($user->introduction))
              {{ $user->introduction }}
            @else
              ーー 自己紹介文は未登録です ーー
            @endif
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
        <span class="c-step-count">{{$user->count_steps}}</span><span class="c-step-unit">STEP</span>
        <h2>Challenge中の人数</h2>
        <span class="c-step-count">{{$user->count_challenge}}</span><span class="c-step-unit">人</span>
        <h2>Challenge済みの人数</h2>
        <span class="c-step-count">{{$user->count_done}}</span><span class="c-step-unit">人</span>
      </div>



      <div class="c-container-body">
        <div class="c-panel-wrap">

          <user-step-component :steps="{{$steps}}"></user-step-component>

        </div>
      </div>

    </div>
  </div>
</div>
@endsection