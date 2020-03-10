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
        <!-- <li class="menu-item mr20"><a class="menu-link" href="">TOP</a></li>
        <li class="menu-item mr20"><a class="menu-link" href="#news">NEWS</a></li>
        <li class="menu-item mr20"><a class="menu-link" href="#about">ABOUT</a></li>
        <li class="menu-item mr20"><a class="menu-link" href="#staff">STAFF</a></li>
        <li class="menu-item mr20"><a class="menu-link" href="#cource">COURCE</a></li>
        <li class="menu-item mr20"><a class="menu-link" href="#contact">CONTACT</a></li> -->
        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
      </ul>
    </nav>
  </header>