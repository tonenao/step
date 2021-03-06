@extends('layouts.app')

@section('title','STEP編集')

@section('content')
<div class="l-main-top">
  <div class="p-container  p-container__top">

    <div class="c-title">
        <h2 class="c-title__word">STEP編集</h2>
    </div>

    <div class="p-container p-container__body">

      <div class="p-panel p-panel__edit">
        <form class="p-panel__edit--form" method="POST" action="{{ route('steps.update',$step->id,false) }}">
            @csrf
            
          <div class="c-form-group">
              <label for="name" class="">STEP名</label>
              <div class="">
                  <input id="title" type="text" class="p-panel__edit--input form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title' ,$step->title) }}" required autocomplete="title" autofocus>
                  @error('title')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('title')  }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="c-form-group">
              <label for="name" class="col-form-label text-md-right">カテゴリー</label>
              <div class="">
                  <select id="category_id" class="p-panel__edit--input form-control @error('category') is-invalid @enderror" name="category_id"  required autocomplete="category_id" autofocus>
                  @foreach($categories as $category)
                      <option value="{{$category->id}}" @if($category->id===$step->category->id) selected @endif>{{$category->category}}</option>
                  @endforeach
                  </select>
                  
              </div>
          </div>

          <div class="c-form-group">
              <label for="achievement_time" class="col-form-label text-md-right">目安時間（※単位：時間）</label>
              <div class="">
                <input id="achievement_time" type="number" min="1" max="10000" class="p-panel__edit--input form-control @error('achievement_time') is-invalid @enderror" name="achievement_time" value="{{ old('achievement_time' ,$step->achievement_time) }}" required autocomplete="achievement_time" autofocus>
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
                  <textarea id="description" class="p-panel__edit--input form-control" name="description" value="{{ $step->description }}" rows="5" required autocomplete="description">{{ old('description' ,$step->description) }}</textarea>
                  @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('description') }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="c-form-group">
            <label for="description" class="col-form-label text-md-right">子STEP</label>
            <div id="app">
              <child-step-edit-component :id="{{$step->id}}"></child-step-edit-component>
            </div>
          </div>
            
          <div class="c-form-group--submit">
            <button type="submit" name="create" class="c-button__submit c-button__form  c-button--accent1">
                更新する
            </button>
          </div>

          <div class="c-form-group--submit">
            <button type="submit" name="cancel" class="c-button__submit c-button__form  c-button--accent3" onclick='return confirm("削除しますか？");'>
                削除する
            </button>
          </div>
        </form>

      </div>
        
    </div>
  </div>
</div>

<script>

</script>

@endsection

