@extends('layouts.app')

@section('title','PROFILE-EDIT')

@section('content')

<div class="l-main-top">
<div class="p-container p-container__top">

    <div class="c-title">
        <h2 class="c-title__word">プロフィール編集</h2>
    </div>
    <div class="p-container p-container__body">

      <form method="POST" action="{{ route('users.update') }}" enctype="multipart/form-data">
            @csrf

            <div class="c-form-group">
                <label for="img" class="">プロフィール画像</label>

                <div class="c-prof-avatar p-prof-avatar--edit" id="area-drop">

                <input type="file" name="pic" multiple="multiple" id="input-file" class="input-file-area">
                   
                    @if(empty($user->pic))
                        <img src="{{asset('img/no-profile-image.png')}}" class="p-prof-avatar__img" id="js-prev-img">
                    @else
                        <img src="data:image/png;base64,{{ $user->pic}}" alt="pic" class="p-prof-avatar__img" id="js-prev-img">
                    @endif

                    @error('pic')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>

            <div class="c-form-group">
                <label for="name" class="">email</label>

                <div class="">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email' ,$user->email) }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="c-form-group">
                <label for="name" class="col-form-label text-md-right">ニックネーム</label>

                <div class="">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name' ,$user->name) }}" required autocomplete="name" autofocus>
                    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="c-form-group">
                <label for="introduction" class="col-form-label text-md-right">自己紹介文</label>

                <div class="">
                    <textarea id="introduction" class="form-control" name="introduction" rows="5">{{ old('introduction' ,$user->introduction) }}</textarea>
                    
                    @error('introduction')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="c-form-group--submit">
                    <button type="submit" class="c-button__submit c-button__form    c-button--accent2">
                        更新する
                    </button>
            </div>
        </form>

    </div>
</div>
</div>

@endsection