@extends('layouts.hello')

@section('title', 'book/delete')

@section('menuber','削除ページ')

@section('content')
<form action="/book/del" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $item->id}}">
    <table>
        <tr>
            <th>ID</th>
            <td>{{ $item->id }}</td>
        </tr>
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
            <td><input type="submit" value="削除"></td>
        </tr>
    </table>
</form>
@endsection

@section('footer')

@endsection