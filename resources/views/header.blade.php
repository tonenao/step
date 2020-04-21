<header  class="l-header">
  <div class="l-header__title" id="js-title">
    <a class="l-header__title--link" href="{{ route('steps.index')}}">
      <h1 class="l-header__title--logo">STEP</h1>
      <p class="l-header__title--desc">Share your experience as STEP</p>
    </a>
  </div>

  @if (session('flash_message_alert'))
    <div class="c-flash__message alert" id="js-show-msg" role="alert">
        {!! session('flash_message_alert') !!}
    </div>
  @elseif (session('flash_message'))
    <div class="c-flash__message" id="js-show-msg" role="alert">
        {!! session('flash_message') !!}
    </div>
  @endif
  
  <div class="p-menu-trigger" id="js-toggle-sp-menu">
    <div class="p-menu-trigger__border"></div>
    <div class="p-menu-trigger__inner"></div>
    <span class="p-menu-trigger__bar"></span>
    <span class="p-menu-trigger__bar"></span>
    <span class="p-menu-trigger__bar"></span>
    <span class="p-menu-trigger__bar"></span>
    <p class="p-menu-trigger__menu">MENU</p>
  </div>
  <nav class="p-nav-menu js-toggle-sp-menu-target">
    <ul class="p-menu p-menu ff1">
      @guest
        <li class="p-nav-item">
          <div>
            <a href="{{ route('steps.top') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              トップページ <span class="caret"></span>
            </a>
          </div>
          <div>
            <a class="nav-link" href="{{ route('login') }}">ログイン</a>
          </div>
        @if (Route::has('register'))
          <div>
            <a class="nav-link" href="{{ route('register') }}">新規登録</a>
          </div>
        @endif
        </li>
      @else
        <li class="p-nav-item ">
          <div style="padding-bottom:40px; font-size:16px">
            <a href="{{ route('users.edit') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            
            <div class="c-prof-avatar p-prof-avatar--nav">

              @if(empty(Auth::user()->pic))
                <img class="p-prof-avatar__img p-prof-avatar__img--nav" src="{{asset('img/no-profile-image.png')}}">
              @else
                <img class="p-prof-avatar__img p-prof-avatar__img--nav" src="data:image/png;base64,{{ Auth::user()->pic}}" alt="pic">
              @endif
            </div>
            <p class="p-prof-avatar__name">{{ Auth::user()->name }}</p>
            </a>
          </div>

          <div>
            <a href="{{ route('steps.index') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              STEP一覧ページ <span class="caret"></span>
            </a>
          </div>

          <div>
            <a href="{{ route('steps.mypage') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              マイページ <span class="caret"></span>
            </a>
          </div>
            
          <div aria-labelledby="navbarDropdown">
            <a  href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                ログアウト
            </a>
          </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
      @endguest
    </ul>
  </nav>
</header>