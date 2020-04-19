@extends('layouts.app')

@section('title','RESET PASSWORD')

@section('content')
<div class="l-main-top">
<div class="c-container p-container-top">

    <div class="c-container-title-wrap">
    <h2 class="c-container-title">パスワード リセット</h2>
    </div>


    @if (session('status'))
        <div class="alert alert-success" role="alert">
            <!-- {{ session('status') }} -->
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

        <div class="c-form-group-submit">
                <button type="submit" class="c-button   c-button-form p-button-accent2">
                    リセット → メール送信
                </button>
        </div>

    </form>
  
</div>
</div>
@endsection
