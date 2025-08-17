@extends('layouts.helloapp')
@section('title', 'Person.find')

@section('menubar')
    @parent
    新規作成ページ
@endsection

@section('content')
    @if (count($errors) > 0)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/person/add" method="post">
        @csrf
        <label>name:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        <label>email:</label>
        <input type="text" name="email" value="{{ old('email') }}">
        <label>age:</label>
        <input type="text" name="age" value="{{ old('age') }}">
        <input type="submit" value="add">
    </form>
@endsection

@section('footer')
    copyright 2017 tuyono.
@endsection
