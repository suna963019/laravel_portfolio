@extends('layouts.page')

@section('title', '楽天表示')

@section('menuber', '楽天ページ')

@section('content')
    <p>楽天APIを用いて本の検索とこのサイトに追加できます。</p>
    <form action="/rakuten" method="get">
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
            $num = 10 * ($count - 1) + 1;
        @endphp
        @foreach ($items as $array)
            @foreach ($array as $item)
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
    <div class="display-flex justify-content-center">
        @if ($count > 1)
            <form action="/rakuten" method="GET">
                <input type="hidden" name="page" value="{{ $count - 1 }}">
                <input type="submit" value="<" class="pager boder-circl">
            </form>
        @endif
        @for ($page_upper = -2; $page_upper <= 2; $page_upper++)
            @if ($page_upper == 0)
                <p class="now-page-count boder-circl">{{ $count }}</p>
            @elseif($count - $page_upper >= 1 && $count + $page_upper <= 10)
                <form action="/rakuten" method="GET">
                    <input type="hidden" name="page" value="{{ $count + $page_upper }}">
                    <input type="submit" value="{{ $count + $page_upper }}" class="page-count boder-circl">
                </form>
            @endif
        @endfor
        @if ($count < 10)
            <form action="/rakuten" method="GET">
                <input type="hidden" name="page" value="{{ $count + 1 }}">
                <input type="submit" value=">" class="pager boder-circl">
            </form>
        @endif
    </div>
@endsection
