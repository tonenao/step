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
          
            <step-detail-component  :id={{$id}} :step="{{json_encode($step)}}" :do_step_id="{{$step->do_steps_auth->id}}" :do_steps="{{$step->do_steps_auth}}"></step-detail-component>

              

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