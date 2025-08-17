@extends('layouts.helloapp')

@section('title', 'Edit')

@section('menubar')
    @parent
    更新ページ
@endsection

@section('content')
    <form action="/hello/edit" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $form->id }}">
        <label for="name">name:</label>
        <div><input type="text" name="name" value="{{ $form->name }}"></div>
        <label for="email">email:</label>
        <div><input type="text" name="email" value="{{ $form->email }}"></div>
        <label for="age">age:</label>
        <div><input type="text" name="age" value="{{ $form->age }}"></div>
        <div><input type="submit" value="send"></div>
    </form>
@endsection

@section('footer')
    copyright 2025 tuyano.
@endsection
