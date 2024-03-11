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
        .display-flex{
            display: flex;
        }
        .justify-content-center{
            justify-content: center;
        }
    </style>
</head>

<body>
    <header class="display-flex">
        <h1>@yield('title')</h1>
        <h3>@yield('menuber')</h3>
    </header>
    <div class="display-flex justify-content-center">
        <div class="content ">
            <ul>
                <li><a href="/book">表示ページ</a></li>
                <li><a href="/book/add">追加ページ</a></li>
                <li><a href="/rakuten">楽天APIページ</a></li>
            </ul>
            @yield('content')
        </div>
    </div>
    <div class="footer">
        @yield('footer')
    </div>
</body>

</html>