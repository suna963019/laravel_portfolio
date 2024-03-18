<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Admin | @yield('title')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        a {
            color: black;
            text-decoration: none;
        }

        #page {
            background-color: rgb(255, 229, 219);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between
        }

        header {
            background-color: coral;
            padding: 10px 10%;
            display: flex;
            justify-content: space-between;
        }

        header * {
            color: aliceblue;
        }

        #header-link-list {
            display: flex;
            margin-top: auto;
        }

        #header-link-list p {
            font-size: 20px;
            padding: 3px 30px;

        }

        #content {
            display: flex;
            justify-content: center;
            padding: 30px;
        }

        main {
            width: 700px;
        }

        sub {}

        footer {
            background-color: coral;
            padding: 10px 10%;
            display: flex;
            justify-content: center;
        }

        footer * {
            color: aliceblue;
        }

        /* コンテンツのCSS */
        table {
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 2px solid coral;
            padding: 5px
        }
        .display-flex{
            display: flex;
        }
        .justify-content-center{
            justify-content: center
        }
        .boder-circl{
            height: 30px;
            width: 30px;
            border: 2px solid coral;
            border-radius: 30px;
        }
        .page-count{
            margin:0 10px;
            font-size: 20px;
            text-align: center;
            padding: 1px 0;
            background-color:transparent;
        }
        .now-page-count{
            margin:0 10px;
            font-size: 20px;
            text-align: center;
            background: coral;
            color: aliceblue;
        }
        .pager{
            background-color:transparent;
            font-size: 30px;
            margin:0 10px;
            line-height: 25px;
        }
    </style>
    @yield('style')
</head>

<body>
    <div id="page">
        <header>
            <h2>Book's Admin</h2>
            <div id="header-link-list">
                <a href="/">
                    <p>表示</p>
                </a>
                <a href="/book/add">
                    <p>追加</p>
                </a>
                <a href="/rakuten">
                    <p>楽天API</p>
                </a>
            </div>
        </header>
        <div id="content">
            <main>
                @yield('content')
            </main>
            <sub>
            </sub>
        </div>
        <footer>
            <div id="header-link-list">
                <a href="/book">
                    <p>表示</p>
                </a>
                <a href="/book/add">
                    <p>追加</p>
                </a>
                <a href="/rakuten">
                    <p>楽天API</p>
                </a>
            </div>
        </footer>
    </div>
</body>

</html>
