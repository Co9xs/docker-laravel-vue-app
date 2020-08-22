<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <header>
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
    <li class="nav-item">
      <button class="nav-link" type="button" onclick="location.href='/home'">マイページ</button>
    </li>
    <li class="nav-item">
      <button class="nav-link" form="logout-form" type="submit">ログアウト</button>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
      </form>
    </li>
  @endguest

  </ul>

</nav>
  </header>

  <main>
  <!-- @yield('content') -->
  <div id="app"></div>
</main>
  
  <footer>
  </footer>
<script src="{{ asset('/js/app.js') }}"></script>
<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>
</body>

</html>