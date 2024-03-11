@extends('layouts.hello')

@section('title', 'rakuten/add')

@section('menuber', '楽天追加ページ')

@section('content')
    <div>
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    <form action="/rakuten/add" method="post">
        @csrf
        <input type="hidden" name="name" value="{{ $item->name }}">
        <input type="hidden" name="author" value="{{ $item->author }}">
        <input type="hidden" name="price" value="{{ $item->price }}">
        <td>
            <table>
                <tr>
                    <th>名前</th>
                    <td>{{ $item->name }}</td>
                </tr>
                <tr>
                    <th>著者</th>
                    <td>{{ $item->author }}</td>
                </tr>
                <tr>
                    <th>値段</th>
                    <td>{{ $item->price }}円</td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" name="send" value="追加"></td>
                </tr>
            </table>
    </form>
@endsection

@section('footer')

@endsection