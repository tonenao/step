@extends('layouts.app')

@section('title','REGISTER')

@section('content')
<div class="l-main-top">
<div class="c-container p-container-top">

    <div class="c-container-title-wrap">
        <h2 class="c-container-title">{{ __('新規登録') }}</h2>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="c-form-group">
            <label for="email" class="">email</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="c-form-group">
            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード（8文字以上）</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"　value="8文字以上で入力してください。">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="c-form-group">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード（確認用）</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" >
            </div>
        </div>

        <div class="c-form-group-submit">
            <button type="submit" class="c-button   c-button-form p-button-accent2">
                {{ __('登録する') }}
            </button>
        </div>


    </form>

</div>
</div>
@endsection
