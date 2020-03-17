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
          <form method="POST" action="{{ route('login') }}">
              @csrf
            <h3 class="c-panel-title">{{ $step->title }}</h3>
            <span class="c-category">{{ $step->category->category }}</span>
            <span class="c-panel-name">{{ $step->user->name }}</span>


            <progress-bar-component
            :count_child="{{ $step->count_child_steps() }}"
            :count_do_child="{{ $step->count_do_child_steps }}"
          ></progress-bar-component>


            <div class="p-description">
              <p>{{ $step->description }}</p>
            </div>

            <div class="c-panel-bar p-panel-bar-mystep">
              <span class="c-panel-bar-info">Challenging!!</span>
              <span class="c-panel-bar-val-sm">人</span>
              <span class="c-panel-bar-val">{{$step->count_challenge()}}</span>
            </div>
            <div class="c-panel-bar p-panel-bar-mystep">
              <span class="c-panel-bar-info">Done!!</span>
              <span class="c-panel-bar-val-sm">人</span>
              <span class="c-panel-bar-val">{{$step->count_done()}}</span>
            </div>

            <div class="c-form-group">
              <div class="">

                <child-step-component :id={{$id}} :count_do_child="{{ $step->count_do_child_steps }}"></child-step-component>


              </div>
            </div>

              

            <div class="c-form-group-submit">
                    <button type="submit" class="c-button   c-button-form p-button-accent2">
                        {{ __('←もどる') }}
                    </button>
            </div>

            <div class="c-form-group-submit">
                    <button type="submit" class="c-button   c-button-form p-button-accent3">
                        {{ __('Challengeする') }}
                    </button>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection