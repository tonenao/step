@extends('layouts.app')

@section('title','STEP登録')

@section('content')
<div class="l-main-top">
    <div class="p-container  p-container__top">

        <div class="c-title">
            <h2 class="c-title__word">STEP登録</h2>
        </div>

        <div class="p-container p-container__body">

            <div class="p-panel p-panel__edit">
            <form class="p-panel__detail--form" method="POST" action="{{ route('steps.create') }}">
                @csrf

                

                <div class="c-form-group">
                    <label for="name" class="">STEP名</label>
                    <div class="">
                        <input id="title" type="text" class="p-panel__edit--input form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="c-form-group">
                    <label for="name" class="col-form-label text-md-right">カテゴリー</label>
                    <div class="">
                        <select id="category_id" class="p-panel__edit--input form-control @error('category') is-invalid @enderror" name="category_id" value="{{ old('category') }}" required autocomplete="category_id" autofocus>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                        </select>
                        
                    </div>
                </div>

                <div class="c-form-group">
                    <label for="achievement_time" class="col-form-label text-md-right">目安時間</label>
                    <div class="">
                    <input id="title" type="number" min="1" max="10000" class="p-panel__edit--input form-control @error('achievement_time') is-invalid @enderror" name="achievement_time" value="{{ old('achievement_time') }}" required autocomplete="achievement_time" autofocus>
                        @error('achievement_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('achievement_time') }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="c-form-group">
                    <label for="description" class="col-form-label text-md-right">説明文</label>
                    <div class="">
                        <textarea id="dexcription" class="p-panel__edit--input form-control" name="description" rows="5" required autocomplete="description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                


                <div class="c-form-group--submit">
                    <button type="submit" name="create" class="c-button__submit c-button__form  c-button--accent1">
                        登録（子STEP登録へ）
                    </button>
                </div>

                <div class="c-form-group--submit">
                    <button type="button" name="cancel" class="c-button__submit c-button__form  c-button--accent3" onclick="location.href='{{route('steps.mypage')}}'">
                        <!-- <a href="{{route('steps.mypage')}}"> -->
                            キャンセルする
                        <!-- </a> -->
                    </button>
                </div>
            </form>

            </div>

            


        </div>
    </div>
</div>



@endsection