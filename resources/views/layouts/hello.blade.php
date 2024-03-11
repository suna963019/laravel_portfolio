<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        th{
            background-color: gray;
            color: white;
        }
        table,th,td{
            border: 1px solid black;
        }
        input[name="send"]{
            float: right;
        }
        form{
            margin: 0;
        }
    </style>
</head>

<body>
    <header>
        <h1>@yield('title')</h1>
        <h3>@yield('menuber')</h3>
        <ul>
            <li><a href="/book">表示ページ</a></li>
            <li><a href="/book/add">追加ページ</a></li>
            <li><a href="/rakuten">楽天APIページ</a></li>
        </ul>
    </header>
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
    </div>
</body>

</html>