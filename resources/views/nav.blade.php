<nav class="navbar navbar-expand navbar-light bg-white shadow-sm">

  <a class="navbar-brand" href="/"><i class="fas fa-laptop-code mr-2 fa-lg"></i>ITインターン.com</a>

  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="/reviews" style="text-align: center;">
        <i class="far fa-comment-dots fa-lg"></i>
        <span style="display: block; font-size: 12px;">口コミを見る</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/companies" style="text-align: center;">
        <i class="fas fa-pen mr-1 fa-lg"></i>
        <span style="display: block; font-size: 12px;">口コミを書く</span>
      </a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto">
  @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">新規登録</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">ログイン</a>
    </li>
  @else
    <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          <i class="fas fa-user-circle"></i>
      </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <button form="logout-form" class="dropdown-item" type="submit">
              ログアウト
          </button>
          <button class="dropdown-item" type="button" onclick="location.href='/home'">
          マイページ
        </button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
  </li>
    <!-- <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
                onclick="location.href='/home'">
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
      </div>
    </li>
    <form id="logout-button" method="POST" action="{{ route('logout') }}">
    </form> -->
  @endguest

  </ul>

</nav>