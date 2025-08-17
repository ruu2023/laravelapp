@extends('layouts.helloapp')
@section('title', 'Person.find')

@section('menubar')
    @parent
    削除ページ
@endsection

@section('content')

    {{ $form->getData() }}

    <form action="/person/del" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $form->id }}">
        <input type="submit" value="send">
    </form>
@endsection

@section('footer')
    copyright 2017 tuyono.
@endsection
