<header id="header" class="c-header">
  <div class="title js-title">
    <a href="{{ route('steps.index')}}">
      <h1 class="title-step">STEP</h1>
      <p class="title-step-sub">Share your life STEP</p>
    </a>
  </div>
  @if (session('flash_message'))
    <div class="c-flash-message" id="js-show-msg" role="alert">
        {!! session('flash_message') !!}
    </div>
@endif
  <div class="c-menu-trigger js-toggle-sp-menu">
    <div class="border"></div>
    <div class="inner"></div>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <p>MENU</p>
  </div>
  <nav id="nav-menu" class="js-toggle-sp-menu-target">
    <ul id="menu" class="p-menu ff1">
      @guest
        <li class="nav-item">
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
        <li class="nav-item dropdown">
          <div style="padding-bottom:40px; font-size:16px">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('users.edit') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            
            <div class="c-img-prof p-prof-nav">

              @if(Auth::user()->pic==='no-profile-image.png')
                <img src="{{asset('img/no-profile-image.png')}}">
              @else
                <img src="{{ asseet('storage/img/'.Auth::user()->pic) }}">
              @endif
            </div>

              {{ Auth::user()->name }}

            </a>
          </div>

          <div>
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('steps.top') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              トップページ <span class="caret"></span>
            </a>
          </div>

          <div>
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('steps.index') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              STEP一覧ページ <span class="caret"></span>
            </a>
          </div>

          <div>
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('steps.mypage') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              マイページ <span class="caret"></span>
            </a>
          </div>
            
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
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