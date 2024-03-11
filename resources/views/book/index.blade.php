@extends('layouts.hello')

@section('title', 'book/index')

@section('menuber', '表示ページ')

@section('content')
    <p>データベースの本を検索、表示できます。</p>
    <form action="/book/search" method="get">
        <input type="text" name="word">
        <input type="submit" value="検索">
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>著者</th>
            <th>値段</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->author }}</td>
                <td>{{ $item->price }}円</td>
                <td>
                    <div id="float_left">
                        <form action="/book/edit" method="GET">
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <input type="submit" value="更新">
                        </form>
                </td>
                <td>
                    <form action="/book/del" method="GET">
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <input type="submit" value="削除">
                    </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')

@endsection