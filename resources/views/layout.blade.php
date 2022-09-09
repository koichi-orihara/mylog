<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  @include('share.flatpickr.styles')
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">ToDo App</a>
    <div class="my-navbar-control">
      @if(Auth::check())
        {{-- ユーザ一覧ページへのリンク --}}
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
              <ul class="dropdown-menu dropdown-menu-right">
                {{-- ユーザ詳細ページへのリンク --}}
                <li class="dropdown-item">{!! link_to_route('users.index', 'プロフィール', ['id' => Auth::id()]) !!}</li>
                {{-- お気に入り一覧ページへのリンク --}}
                {{-- <li class="dropdown-item">{!! link_to_route('users.favorites', 'お気に入り', ['id' => Auth::id()]) !!}</li> --}}
                <li class="dropdown-divider"></li>
                {{-- ログアウトへのリンク --}}
                <li class="dropdown-item">
                  <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>
              </ul>
        </li>
      @else
        <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
        ｜
        <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
      @endif
    </div>
  </nav>
</header>
<main>
  @yield('content')
</main>
@if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
@endif
@include('share.flatpickr.scripts')
</body>
</html>