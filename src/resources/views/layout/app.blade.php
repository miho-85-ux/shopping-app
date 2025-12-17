<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <title>お買い物アプリ</title>
    @yield('css')
</head>
<body>
    <div class="header">
        <div class="header__title">
            <h1><a class="header__title--top" href="/">お買い物アプリ</a></h1>
        </div>
    </div>
    <main>
        @yield('content')
    </main>
</body>
</html>