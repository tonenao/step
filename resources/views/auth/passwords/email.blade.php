@extends('layouts.app')

@section('title','RESET PASSWORD')

@section('content')
<div class="l-main-top">
<div class="c-container p-container-top">

    <div class="c-container-title-wrap">
    <h2 class="c-container-title">{{ __('Reset Password') }}</h2>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="c-form-group">
            <label for="email" class="">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="c-form-group-submit">
                <button type="submit" class="c-button   c-button-form p-button-accent2">
                    {{ __('Send Password Reset Link') }}
                </button>
        </div>

    </form>
  
</div>
</div>
@endsection
