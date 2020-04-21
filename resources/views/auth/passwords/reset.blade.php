@extends('layouts.app')

@section('title','RESET PASSWORD')

@section('content')
<div class="l-main-top">
<div class="p-container p-container__top">

    <div class="c-title">
        <h2 class="c-title__word">パスワード リセット</h2>
    </div>

    <div class="alert alert-success" role="alert">
            新しいパスワードを設定しなおしてください。
        </div>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="c-form-group" style="display:none;l">
            <label for="email" class="col-md-4 col-form-label text-md-right">email</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="c-form-group">
            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="c-form-group">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード（再入力）</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>


        <div class="c-form-group--submit">
                <button type="submit" class="c-button__submit c-button__form    c-button--accent2">
                    パスワード再登録
                </button>
        </div>
    </form>

</div>
</div>
@endsection
