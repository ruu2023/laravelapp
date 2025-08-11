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
    <p>{{ $msg }}</p>
    {{-- @if (count($errors) > 0)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <form aciton="/hello" method="post">
        @csrf
        <div>
            <label style="dispaly: inline-block; width: 75px;" for="name">
                name:
            </label>
            <input type="text" name="name" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <p style="font-size: 10pt; margin-top: 0px;">
                    ERROR: {{ $errors->first('name') }}
                </p>
            @endif
        </div>
        <div>
            <label style="display: inline-block; width: 75px;" for="mail">
                mail:
            </label>
            <input type="text" name="mail" value="{{ old('mail') }}">
            @error('mail')
                <p style="font-size: 10pt; margin-top: 0px;">
                    ERROR: {{ $errors->first('mail') }}
                </p>
            @enderror
        </div>
        <div>
            <label style="display: inline-block; width: 75px;" for="age">
                age:
            </label>
            <input type="number" name="age" value="{{ old('age') }}">
            @error('age')
                <p style="font-size: 10pt; margin-top: 0px;">
                    ERROR: {{ $errors->first('age') }}
                </p>
            @enderror
            <input type="submit" value="send">
        </div>

    </form>
@endsection

@section('footer')
    copyright 20205 tuyono.
@endsection
