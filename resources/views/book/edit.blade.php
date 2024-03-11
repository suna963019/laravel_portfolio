@extends('layouts.hello')

@section('title', 'book/edit')

@section('menuber', '更新ページ')

@section('content')
    <div>
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    <form action="/book/edit" method="post">
        @csrf
        <input type="hidden" name="check" value="true">
        <table>
            <tr>
                <th>名前</th>
                <td>{{ $item->name }}</td>
            </tr>
            <tr>
                <th>著者</th>
                <td>{{ $item->author}}</td>
            </tr>
            <tr>
                <th>値段</th>
                <td>{{ $item->price }}円</td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="追加"></td>
            </tr>
        </table>
    </form>
@endsection

@section('footer')

@endsection