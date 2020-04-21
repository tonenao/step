@extends('layouts.app')

@section('title','MYPAGE')

@section('content')
<div id="app">
  <div class="l-main-top">
    <div class="p-container p-container__top">

      <div class="c-title">
          <h2 class="c-title__word">チャレンジ中STEP</h2>
      </div>

      <div class="p-container p-container__body">
        <div class="p-panel__wrap">

          <my-challenge-component></my-challenge-component>


        </div>
      </div>
    </div>
  </div>

  <div class="l-main">
    <div class="p-container">

      <div class="c-title">
          <h2 class="c-title__word">登録したSTEP</h2>
      </div>

      
      <a href="{{ route('steps.new')}}" style="margin:30px auto;">
          <button type="submit" name="create" class="c-button__submit c-button__form  c-button--accent3" style="padding:0 50px;">
              STEPを新規作成する
          </button>
      </a>


      <div class="p-container p-container__body">
          
        <div class="p-panel__wrap">
          
          
            <my-step-component></my-step-component>

        </div>
      </div>
    </div>
  </div>
</div>



@endsection