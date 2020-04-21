@extends('layouts.app')

@section('title','PROFILE-DETAIL')

@section('content')
<div id="app">
  <div class="l-main-top">
    <div class="p-container p-container__top">
      <div class="c-title">
          <h2 class="c-title__word">{{ $user->name }}</h2>
      </div>
      <div class="p-container p-container__body">
        <div class="c-prof-avatar p-prof-avatar--edit">

            @if(empty($user->pic))
                <img class="p-prof-avatar__img" src="{{asset('img/no-profile-image.png')}}">
            @else
              <img class="p-prof-avatar__img" src="data:image/png;base64,{{ $user->pic}}" alt="pic">
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
    <div class="p-container">
      <div class="c-title">
          <h2 class="c-title__word">公開中のSTEP</h2>
      </div>

      <div class="p-container__users">
        <h2 class="p-container__users--title">公開中のSTEP</h2>
        <span class="p-container__users--count">{{$user->count_steps}}</span><span class="p-container__users--unit">STEP</span>
        <h2 class="p-container__users--title">Challenge中の人数</h2>
        <span class="p-container__users--count">{{$user->count_challenge}}</span><span class="p-container__users--unit">人</span>
        <h2 class="p-container__users--title">Challenge済みの人数</h2>
        <span class="p-container__users--count">{{$user->count_done}}</span><span class="p-container__users--unit">人</span>
      </div>



      <div class="p-container p-container__body">
        <div class="p-panel__wrap">

          <user-step-component :steps="{{$steps}}"></user-step-component>

        </div>
      </div>

    </div>
  </div>
</div>
@endsection