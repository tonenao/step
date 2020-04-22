@extends('layouts.app')

@section('title','STEP詳細')

@section('content')
<div id="app">
  <div class="l-main-top">
    <div class="p-container  p-container__top">

      <div class="c-title">
          <h2 class="c-title__word">STEP詳細</h2>
      </div>

      <div class="p-container p-container__body">

        <div class="p-panel p-panel__detail">

          <form class="p-panel__detail--form" method="POST" action="">
              @csrf
            <h3 class="p-panel__title detail">{{ $step->title }}</h3>
            <span class="c-category">{{ $step->category->category }}</span>
            <a href="{{ route('users.show',['id'=>$step->user->id]) }}" class="p-panel__link--img">
            <div class="c-prof-avatar p-prof-avatar--step">

            @if(empty($step->user->pic))
                <img class="p-prof-avatar__img p-prof-avatar__img--step" src="{{asset('img/no-profile-image.png')}}">
            @else
              <img class="p-prof-avatar__img p-prof-avatar__img--step" src="data:image/png;base64,{{ $step->user->pic}}" alt="pic">
            @endif

            </div>
              <span class="p-panel__name p-panel__name--edit">{{ $step->user->name }}</span>
            </a>

            
            @auth
            <step-detail-component   :auth=true :step="{{json_encode($step)}}"></step-detail-component>
            @else
            <step-detail-component  :auth=false  :step="{{json_encode($step)}}"></step-detail-component>
            @endauth


            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="【{{ $step->title }}】"  data-hashtags="STEPを共有しよう"  data-lang="ja" data-dnt="true" data-show-count="true">Tweet</a>

         </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection