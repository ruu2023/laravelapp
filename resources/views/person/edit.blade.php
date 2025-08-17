@extends('layouts.helloapp')
@section('title', 'Person.find')

@section('menubar')
    @parent
    編集ページ
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

    <form action="/person/edit" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $form->id }}">
        <label>name:</label>
        <input type="text" name="name" value="{{ $form->name }}">
        <label>email:</label>
        <input type="text" name="email" value="{{ $form->email }}">
        <label>age:</label>
        <input type="text" name="age" value="{{ $form->age }}">
        <input type="submit" value="send">
    </form>
@endsection

@section('footer')
    copyright 2017 tuyono.
@endsection
