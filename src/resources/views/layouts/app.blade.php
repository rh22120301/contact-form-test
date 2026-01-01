<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  @yield('css')
  
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                <h2>FashionablyLate</h2>
            </a>
        </div>

        <ul class="header__nav">
            @if (Auth::check())
            <li class="header__nav-item">
                <form action="/logout" method="post">
                    @csrf
                    <button class="header__nav-button">logout</button>
                </form>
            </li>
            @endif
        </ul>    
    </header>

    <main>
    @yield('content')
    </main>
   
</body>
</html>