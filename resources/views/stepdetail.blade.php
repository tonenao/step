@extends('layouts.app')

@section('title','STEP詳細')

@section('content')
<div id="app">
  <div class="l-main-top">
    <div class="c-container  p-container-top">

      <div class="c-container-title-wrap">
          <h2 class="c-container-title">{{ __('STEP詳細') }}</h2>
      </div>

      <div class="c-container-body">

        <div class="c-panel p-panel-detail">

          <form method="POST" action="">
              @csrf
            <h3 class="c-panel-title">{{ $step->title }}</h3>
            <span class="c-category">{{ $step->category->category }}</span>
            <a href="{{ route('users.show',['id'=>$step->user->id]) }}" class="link">
              <span class="c-panel-name">{{ $step->user->name }}</span>
            </a>

            <step-detail-component  :step="{{json_encode($step)}}"  :do_steps="{{$step->do_steps_auth}}"></step-detail-component>
            
            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-hashtags="STEP" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

         </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection