@extends('layouts.hello')

@section('title', 'book/add')

@section('menuber', '追加ページ')

@section('content')
    <p>この本を追加しますか？</p>
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
    <form action="/book/add" method="post">
        @csrf
        <table>
            <tr>
                <th>名前</th>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <th>著者</th>
                <td><input type="text" name="author"></td>
            </tr>
            <tr>
                <th>値段</th>
                <td><input type="number" name="price"></td>
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
