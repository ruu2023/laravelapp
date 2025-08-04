{{-- <html>

<head>
    <title>hello/index</title>
    <style>
        body {
            font-size: 16pt;
            color: #999;
        }

        h1 {
            font-size: 100pt;
            text-align: right;
            color: #eee;
            margin: -40px 0px -50px 0px;
        }
    </style>
</head>

<body>
    <h1>Index</h1>
    <p>{{ 12300 * 1.08 }}</p>
    <p><?= date('Y年n月j日') ?></p>
    <p>{!! 'this is <b>sample</b><i>message.</i>' !!}</p>
    @foreach ($data as $data)
        @if ($loop->first)
            <p>データ一覧</p>
            <ul>
        @endif
        <li>No.{{ $loop->iteration }}:{{ $data }}</li>
        @if ($loop->last)
            </ul>
        @endif
    @endforeach
    <p>this is index page</p>
    <form method="POST" action="/hello">
        @csrf
        <input tyle="text" name="msg">
        <input type="submit">
    </form>
</body>

</html> --}}


@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです。</p>
    @each('hello.item', $data, 'item')
    <p>必要なだけ記述できます。</p>
    @include('hello.message', ['msg_title' => 'OK', 'msg_content' => 'サブビューです。'])
@endsection

@section('footer')
    copyright 20205 tuyono.
@endsection
