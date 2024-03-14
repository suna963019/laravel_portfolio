@extends('layouts.page')

@section('title', '楽天追加')

@section('menuber', '楽天追加ページ')

@section('content')
    <p>この本のデータを追加しますか？</p>
    <div>
        <ul>
            @foreach ($errors->all() as $item)
                @if ($item === 'The name field is required.')
                    <p>名前を入力してください。</p>
                @elseif($item === 'The author field is required.')
                    <p>作者を入力してください。</p>
                @elseif($item === 'The price field is required.')
                    <p>値段を入力してください。</p>
                @endif
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