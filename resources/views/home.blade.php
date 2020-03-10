@extends('layouts.app')

@section('title','HOME')

@section('content')
<div id="app">
  <div class="l-main-top">
    <div class="c-container  p-container-top">

      <div class="c-container-title-wrap">
          <h2 class="c-container-title">{{ __('人気STEP一覧') }}</h2>
      </div>
      <div class="c-container-body">
        <div class="c-panel-wrap">

          <home-step-component></home-step-component>
          
        </div>
      </div>
    </div>
  </div>

  <div class="l-main">
    <div class="c-container">

      <div class="c-container-title-wrap">
          <h2 class="c-container-title">{{ __('STEP一覧') }}</h2>
      </div>
      
      <div class="c-container-body">
          

        <div class="c-panel-wrap">


          <home-step-component></home-step-component>


            <!-- @foreach($steps as $step)
                <div class="c-panel p-panel-step p-panel-step-done">

                  <a href="{{ route('steps.show',$step->id) }}">

                  <span class="c-panel-badge">
                    <i class="fas fa-check"></i>
                  </span>
                    <h3 class="c-panel-title">{{ $step->title }}</h3>
                    <span class="c-category">{{ $step->category->category }}</span>
                    <span class="c-panel-name">{{ $step->user->name }}</span>
                    <div class="c-panel-bar p-panel-bar-done">
                      <span class="c-panel-bar-info">Challenging!!</span>
                  
                      <span class="c-panel-bar-val-sm">人</span>
                      <span class="c-panel-bar-val">{{ $step->count_challenge() }}</span>
                    </div>
                    <div class="c-panel-bar p-panel-bar-done">
                      <span class="c-panel-bar-info">Done!!</span>
                      <span class="c-panel-bar-val-sm">人</span>
                      <span class="c-panel-bar-val">{{ $step->count_done() }}</span>
                    </div>
                  </a>
                </div>
              @endforeach -->
        </div>

      </div>
    </div>
  </div>
</div>



@endsection