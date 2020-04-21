@extends('layouts.app')

@section('title','RESET PASSWORD')

@section('content')
<div class="l-main-top">
<div class="p-container p-container__top">

    <div class="c-title">
    <h2 class="c-title__word">パスワード リセット</h2>
    </div>


    @if (session('flash_message'))
        <div class="alert alert-success" role="alert">
            <!-- {{ session('flash_message') }} -->
        </div>
    @else
        <div class="alert alert-success" role="alert">
            emailを入力して進めてください。
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="c-form-group">
            <label for="email" class="">email</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="c-form-group--submit">
                <button type="submit" class="c-button__submit c-button__form    c-button--accent2">
                    リセット → メール送信
                </button>
        </div>

    </form>
  
</div>
</div>
@endsection
