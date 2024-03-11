@extends('layouts.hello')

@section('title', 'rakuten/index')

@section('menuber', '楽天ページ')

@section('content')
    <form action="/book/search" method="get">
        <input type="text" name="keyword">
        <input type="submit" value="検索">
    </form>
    <table>
        <tr>
            <th></th>
            <th>名前</th>
            <th>著者</th>
            <th>値段</th>
            <th></th>
        </tr>
        @php
            $num = 30 * ($count - 1) + 1;
        @endphp
        @foreach ($items as $array)
            @foreach ($array as $item)
                {{-- {{dd($item)}} --}}
                <form action="/rakuten/add" method="GET">
                    <input type="hidden" name="name" value="{{ $item['title'] }}">
                    <input type="hidden" name="author" value="{{ $item['author'] }}">
                    <input type="hidden" name="price" value="{{ $item['itemPrice'] }}">
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['author'] }}</td>
                        <td>{{ $item['itemPrice'] }}円</td>
                        <td>
                            <div id="float_left">
                                <input type="submit" value="追加">
                            </div>
                        </td>
                    </tr>
                </form>
            @endforeach
        @endforeach
    </table>
    @if ($count > 1)
        <form action="/rakuten" method="GET">
            <input type="hidden" name="page" value="{{ $count - 1 }}">
            <input type="submit" value="前">
        </form>
    @endif
    @if ($count < 3)
        <form action="/rakuten" method="GET">
            <input type="hidden" name="page" value="{{ $count + 1 }}">
            <input type="submit" value="次">
        </form>
    @endif
@endsection

@section('footer')

@endsection