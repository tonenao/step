@extends('layouts.app')

@section('title','STEP編集')

@section('content')
<div class="l-main-top">
  <div class="c-container  p-container-top">

    <div class="c-container-title-wrap">
        <h2 class="c-container-title">STEP編集</h2>
    </div>

    <div class="c-container-body">

      <div class="c-panel p-panel-edit">
        <form method="POST" action="{{ route('steps.update',$step->id) }}">
            @csrf
            
          <div class="c-form-group">
              <label for="name" class="">STEP名</label>
              <div class="">
                  <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $step->title }}" required autocomplete="title" autofocus>
                  @error('title')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="c-form-group">
              <label for="name" class="col-form-label text-md-right">カテゴリー</label>
              <div class="">
                  <select id="category_id" class="form-control @error('category') is-invalid @enderror" name="category_id"  required autocomplete="category_id" autofocus>
                  @foreach($categories as $category)
                      <option value="{{$category->id}}" @if($category->id===$step->category->id) selected @endif>{{$category->category}}</option>
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
              <label for="achievement_time" class="col-form-label text-md-right">目安時間（※単位：時間）</label>
              <div class="">
                <input id="achievement_time" type="number" min="0" class="form-control @error('achievement_time') is-invalid @enderror" name="achievement_time" value="{{ $step->achievement_time }}" required autocomplete="achievement_time" autofocus>
                  @error('achievement_time')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="c-form-group">
              <label for="description" class="col-form-label text-md-right">説明文</label>
              <div class="">
                  <textarea id="description" class="form-control" name="description" value="{{ $step->description }}" rows="5" required autocomplete="description">{{ $step->description }}</textarea>
                  @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
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
            
          <div class="c-form-group-submit">
            <button type="submit" name="create" class="c-button c-button-form p-button-accent2">
                更新する
            </button>
          </div>

          <div class="c-form-group-submit">
            <button type="submit" name="cancel" class="c-button c-button-form p-button-accent3" onclick='return confirm("削除しますか？");'>
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

