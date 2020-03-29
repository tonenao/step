<header id="header" class="c-header">
  <div class="title">
    <a href="{{ route('steps.index')}}">
      <h1 class="title-step">STEP</h1>
      <p class="title-step-sub">Share your life STEP</p>
    </a>
  </div>
  <div class="c-menu-trigger">
    <span></span>
    <span></span>
    <span></span>
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
          <div>
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('users.edit') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
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