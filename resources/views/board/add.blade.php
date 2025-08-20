@extends('layouts.helloapp')

@section('title', 'Board.add')

@section('menubar')
    @parent
    投稿ページ
@endsection

@section('content')
    <form action="/board/add" method="post">
        @csrf
        <label>person id: </label>
        <div><input type="number" name="person_id"></div>
        <label>title: </label>
        <div><input type="text" name="title"></div>
        <label>message: </label>
        <div><input type="text" name="message"></div>
        <div><input type="submit" value="send"></div>
    </form>
@endsection
@section('footer')
    copyright 2025 tuyono.
@endsection
