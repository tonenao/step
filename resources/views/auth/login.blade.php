@extends('layouts.app')

@section('title','LOGIN')

@section('content')
<div class="l-main-top">
    <div class="p-container p-container__top">

        <div class="c-title">
            <h2 class="c-title__word">{{ __('ログイン') }}</h2>
        </div>


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="c-form-group">
                <label for="email" class="">email</label>

                <div class="">
                    <!-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"> -->
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="c-form-group">
                <label for="password" class="">パスワード</label>

                <div class="">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="c-form-group">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            自動でログイン
                        </label>
                    </div>
                </div>
            </div>

            <div class="c-form-group--submit">
                    <button type="submit" class="c-button__submit c-button__form    c-button--accent2">
                        ログイン
                    </button>
            </div>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            パスワードを忘れた方はこちら
                        </a>
                    @endif
        </form>

    </div>
</div>
@endsection
