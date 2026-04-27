<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form App</title>
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
        @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__logo">
            <a href="/">FashionablyLate</a>
        </div>
        <div class="header__nav">
            @yield('header-button')
        </div>
    </header>
    <main class="main">
        @yield('content')
    </main>
    @yield('scripts')
</body>
</html>