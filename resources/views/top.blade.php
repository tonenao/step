@extends('layouts.app')

@section('title','TOP')

@section('content')
<div class="l-main-top p-page-top">

  <div class="c-hero" style="background-image: url('{{asset('img/hero.jpg')}}');">
    <button class="c-button c-button-top c-button-hero p-button-accent2">
      <a href="{{ route('register') }}">
        新規登録
      </a>
    </button>
  </div>

  <!-- <div class="c-container" style="min-height:1000px;"> -->
  <div class="c-container p-container-main">
    <div class="c-container-title-wrap p-top">
          <h2 class="c-container-title">★『STEP』概要</h2>
    </div>
    <div class="c-container-body">
      <p>プログラミングや英語など、</p>
      <p>何かのスキルを高めるための方法は一つだけではありません。</p>
      <br>
      <p>人それぞれの「これが良かった」という「内容」や「順番」があります。</p>
      <img  src="{{asset('/img/img1.jpg')}}">
      <br>
      <p>この「STEP」というサービスでは、</p>
      <p>あなた自身の経験の中で上手くいった方法を「STEP」として共有したり</p>
      <p>誰かが共有した「STEP」を実際に使ってスキルアップを進めていくことができます。</p>
      <br>
      <br>
      <div class="p-top-link">
        <a href="#step">「模倣」って、なんか抵抗がある</a>
        <br>
        <a href="#share">「STEP」を共有しよう</a>
        <br>
        <a href="#challenge">「STEP」を使ってみよう</a>
      </div>

    </div>
  </div>

  <div class="c-container p-container-accent1">
    <div class="c-container-title-wrap p-top">
          <h2 class="c-container-title" id="step">上達のコツは「模倣」にあり</h2>
    </div>
    <div class="c-container-body">
      <p>「模倣する」という言葉には</p>
      <p>なんとなくネガティブな印象を持ってしまいませんか？</p>
      <br>
      <p>いっぽう「自分のアイデア」「オリジナル」「独創的」という言葉には</p>
      <p>より優れたもののように感じてしまいがちです。</p>
      <br>
      <br>
      <p>でも何かのスキルを身につけるために学習を始める場合、</p>
      <p>より効率的に成果を出すことができるのは</p>
      <br>
      <p>「模倣すること」なのです。</p>
      <img  src="{{asset('/img/img2.jpg')}}">
      <p>時間が無限にあるのであれば、</p>
      <p>最初から「自分のやり方」で進めてみてもいいでしょう。</p>
      <p>失敗しても諦めずに試行錯誤することでいつかは達成できます。</p>
      <br>
      <p>ですが、私たちの時間は有限です。</p>
      <p>先人等がたくさんの失敗の上で造ってきた試行錯誤を使わせてもらう。</p>
      <br>
      <p>そこに自分の経験や価値観をミックスさせることで</p>
      <p>初めて価値のあるオリジナリティや独自性を生み出せばいいのです。</p>
    </div>
  </div>

  <div class="c-container">
    <div class="c-container-title-wrap p-top">
          <h2 class="c-container-title" id="share">共有しよう</h2>
    </div>
    <div class="c-container-body">
      <p>もしも、あなたが試行錯誤の上に</p>
      <p>何らかの結果を達成したことがあれば</p>
      <p>その「順番」と「内容」を、STEPとしてぜひ共有してみてください。</p>
      <img  src="{{asset('/img/img3.jpg')}}">
      <p>ノウハウを「STEP」として形にすることで</p>
      <p>あなた自身へのたくさんのメリットがあります。</p>
      <p>※理屈は「ノウハウ　メリット」などと検索をしてみてください。</p>
      <br>
      <p>そのためにこの「STEP」を活用してみてください。</p>
      <br>
      <br>
      <p></p>
      <p></p>
      <p></p>
    </div>
  </div>

  <div class="c-container p-container-main" style="margin-bottom:0;">
    <div class="c-container-title-wrap p-top">
          <h2 class="c-container-title" id="challenge">使ってみよう</h2>
    </div>
    <div class="c-container-body">
      <p>なんらかの達成したい目的があれば</p>
      <p>すでにそれを達成した人の「STEP」を辿ることが非常に有効です。</p>
      <img  src="{{asset('/img/img4.jpg')}}">
      <p>その際に重要なのが「素直さ」と「継続」です。</p>
      <br>
      <p>「自分の考えや価値観」で勝手に判断せず</p>
      <p>先人のSTEPを辿って行動し続けてみてください。</p>
      <br>
      <p>途中で退屈に思う時があるかもしれません。</p>
      <p>なかなか成果を感じれずイヤになるかもしれません。</p>
      <p>壁にぶち当たる時もあるかもしれません。</p>
      <br>
      <p>途中で諦めてもっともらしい言い訳をつけてしまうことは簡単です。</p>
      <p>継続しない限り目標達成はありえません。</p>
      <br>
      <br>
      <br>
      <br>
      <br>
    </div>

    <button class="c-button c-button-top c-button-challenge p-button-accent2">
      <a href="{{ route('register') }}">
        新規登録
      </a>
    </button>
  </div>




</div>


@endsection