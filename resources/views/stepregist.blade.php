@extends('layouts.app')

@section('title','STEP登録')

@section('content')
<div class="l-main-top">
    <div class="c-container  p-container-top">

        <div class="c-container-title-wrap">
            <h2 class="c-container-title">{{ __('STEP登録') }}</h2>
        </div>

        <div class="c-container-body">

            <div class="c-panel p-panel-edit">
            <form method="POST" action="{{ route('steps.create') }}">
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
                        <select id="category_id" class="form-control @error('category') is-invalid @enderror" name="category_id" value="{{ old('category') }}" required autocomplete="category_id" autofocus>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
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
                        <textarea id="dexcription" class="form-control" name="description" rows="5" required autocomplete="description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                
                <div class="c-form-group-submit">
                    <button type="submit" name="create" class="c-button c-button-form p-button-accent2">
                        登録（子STEP登録へ）
                    </button>
                </div>

                <div class="c-form-group-submit">
                    <a href="{{route('steps.mypage')}}" style="width:100%; height:100%; padding:0;">
                        <button type="button" name="cancel" class="c-button c-button-form p-button-accent3">
                            キャンセルする
                        </button>
                    </a>
                </div>
            </form>

            </div>

            

        <!-- </div> -->
        </div>
    </div>
</div>



@endsection