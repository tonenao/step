@extends('layouts.app')

@section('title','CONTACT')

@section('content')
<div class="l-main-top">
<div class="c-container p-container-top">

        <div class="c-container-title-wrap">
            <h2 class="c-container-title">お問い合わせ</h2>
        </div>


        <form method="POST" action="{{ route('confirm') }}">
            @csrf

            <div class="c-form-group">
                <label for="InputEmail" class="">email</label>

                <div class="">
                <input id="InputEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="c-form-group">
                <label for="InputSubject" class="">件名</label>

                <div class="">
                <input id="InputSubject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject" autofocus>
                    

                    @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('subject') }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="c-form-group">
                <label for="InputComment" class="col-form-label text-md-right">お問い合わせ内容</label>

                <div class="">
                    <textarea id="InputComment" class="form-control" name="comment" rows="10">{{ old('comment') }}</textarea>
                    
                    @error('comment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        
            <div class="c-form-group-submit">
                    <button type="submit" name="action" value="sent" class="c-button c-button-form p-button-accent2">
                        内容確認画面へ
                    </button>
            </div>

                    
        </form>

</div>
</div>
@endsection
