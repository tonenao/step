@extends('layouts.app')

@section('title','STEP登録')

@section('content')
<div class="l-main-top">
<div class="c-container  p-container-top">

    <div class="c-container-title-wrap">
        <h2 class="c-container-title">{{ __('STEP登録') }}</h2>
    </div>

    <div class="c-container-body">
      <!-- <div id="app">
        <example-component></example-component>
      </div> -->
      <!-- <div class="c-panel-wrap"> -->

        <div class="c-panel p-panel-edit">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            

            <div class="c-form-group">
                <label for="name" class="">{{ __('STEP名') }}</label>
                <div class="">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="c-form-group">
                <label for="name" class="col-form-label text-md-right">{{ __('カテゴリー') }}</label>
                <div class="">
                    <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus>
                    <option value="英語学習">英語学習</option> <option value="B">B</option>
                    <option value="C">C</option>
                    </select>
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="c-form-group">
                <label for="achievement_time" class="col-form-label text-md-right">{{ __('目安時間') }}</label>
                <div class="">
                  <input id="title" type="number" min="0" class="form-control @error('achievement_time') is-invalid @enderror" name="achievement_time" value="{{ old('achievement_time') }}" required autocomplete="achievement_time" autofocus>
                    @error('achievement_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="c-form-group">
                <label for="description" class="col-form-label text-md-right">{{ __('説明文 ') }}</label>
                <div class="">
                    <textarea id="dexcription" class="form-control" name="description" rows="5">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="c-form-group">
                <label for="description" class="col-form-label text-md-right">{{ __('子STEP ') }}</label>
                <div class="">

                  <div class="c-step-child">
                    <h3>STEP1</h3>
                    <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                    <button class="c-button c-button-step-child p-button-accent3">編集</button>
                  </div>

                  <div class="c-step-child">
                    <h3>STEP2</h3>
                    <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                    <button class="c-button c-button-step-child p-button-accent3">編集</button>
                  </div>

                  <div class="c-step-child">
                    <h3>STEP3</h3>
                    <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                    <button class="c-button c-button-step-child p-button-accent3">編集</button>
                  </div>

                  <div class="c-step-child">
                    <h3>STEP4</h3>
                    <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                    <button class="c-button c-button-step-child p-button-accent3">編集</button>
                  </div>

                  <div class="c-step-child">
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