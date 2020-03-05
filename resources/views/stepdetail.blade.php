@extends('layouts.app')

@section('title','STEP詳細')

@section('content')
<div class="l-main-top">
<div class="c-container  p-container-top">

    <div class="c-container-title-wrap">
        <h2 class="c-container-title">{{ __('STEP詳細') }}</h2>
    </div>

    <div class="c-container-body">
      <!-- <div id="app">
        <example-component></example-component>
      </div> -->
      <!-- <div class="c-panel-wrap"> -->

        <div class="c-panel p-panel-detail">
        <form method="POST" action="{{ route('login') }}">
            @csrf
        <h3 class="c-panel-title">最短で学んだ英語学習あああああああああ</h3>
        <span class="c-category">英語学習</span>

          <span class="c-panel-name">aaaaaaa</span>




          <div class="c-panel-bar">
            <span class="c-panel-bar-info">進捗…</span>
            <span class="c-panel-bar-val-sm">10</span>
            <span class="c-panel-bar-val">3/</span>
          <div class="c-panel-bar-progress"></div>
          </div>

            

            <div class="c-form-group">
                <div class="">

                  <div class="c-step-child p-step-detail">
                    <h3>STEP1</h3>
                    <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                    <button class="c-button c-button-step-child p-button-accent3">編集</button>
                  </div>

                  <div class="c-step-child p-step-detail">
                    <h3>STEP2</h3>
                    <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                    <button class="c-button c-button-step-child p-button-accent3">編集</button>
                  </div>

                  <div class="c-step-child p-step-detail">
                    <h3>STEP3</h3>
                    <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                    <button class="c-button c-button-step-child p-button-accent3">編集</button>
                  </div>

                  <div class="c-step-child p-step-detail">
                    <h3>STEP4</h3>
                    <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                    <button class="c-button c-button-step-child p-button-accent3">編集</button>
                  </div>

                  <div class="c-step-child p-step-detail">
                    <h3>STEP5</h3>
                    <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                    <button class="c-button c-button-step-child p-button-accent3">編集</button>
                  </div>



                </div>
            </div>

            

            <div class="c-form-group-submit">
                    <button type="submit" class="c-button   c-button-form p-button-accent2">
                        {{ __('更新する ') }}
                    </button>
            </div>
        </form>
        </div>

        

    <!-- </div> -->
</div>
</div>
</div>



@endsection