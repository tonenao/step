@extends('layouts.app')

@section('title','CONFIRM')

@section('content')
<div class="l-main-top">
<div class="p-container p-container__top">

        <div class="c-title">
            <h2 class="c-title__word">問合わせ内容確認</h2>
        </div>

        
        <p>下記、お問い合わせ内容にて送信します。よろしければ「送信」ボタンを押して下さい。</p>
        
            <div class="c-form-group confirm">
                <label class="">email</label>

                <p class="c-form-group--email">{{$email}}</p>
            </div>

            <div class="c-form-group confirm">
                <label class="">件名</label>

                <p class="c-form-group--email">{{$subject}}</p>
            </div>

            <div class="c-form-group confirm">
                <label class="col-form-label text-md-right">問合わせ内容</label>

                <p class="c-form-group--email">{!! nl2br(e($comment)) !!}</p>
            </div>

        
            
            
        <form method="POST" action="{{ route('complete') }}">
            
            <input type="hidden" name="email" class="form-control" id="InputEmail" value="{{ $email }}">
            <input type="hidden" name="subject" class="form-control" id="InputSubject" value="{{ $subject }}">
            <input type="hidden" name="comment" class="form-control" id="InputComment" value="{{ $comment }}">
            @csrf
            
            <div class="c-form-group--submit">
                    <button type="submit" name="action" value="sent" class="c-button__submit c-button__form  c-button--accent3">
                        送信
                    </button>
            </div>

            <div class="c-form-group--submit">
                    <button type="submit" name="action" value="back" class="c-button__submit c-button__form  c-button--accent1">
                        戻る
                    </button>
            </div>
                    
        </form>

    </div>
</div>
@endsection
