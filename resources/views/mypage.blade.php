@extends('layouts.app')

@section('title','MYPAGE')

@section('content')
<div id="app">
  <div class="l-main-top">
    <div class="c-container p-container-top">

      <div class="c-container-title-wrap">
          <h2 class="c-container-title">チャレンジ中STEP</h2>
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
          <h2 class="c-container-title">登録したSTEP</h2>
      </div>

      
      <a href="{{ route('steps.new')}}" style="margin:30px auto;">
          <button type="submit" name="create" class="c-button c-button-form p-button-accent3" style="padding:0 50px;">
              STEPを新規作成する
          </button>
      </a>


      <div class="c-container-body">
          
        <div class="c-panel-wrap">
          
          
            <my-step-component></my-step-component>

        </div>
      </div>
    </div>
  </div>
</div>



@endsection