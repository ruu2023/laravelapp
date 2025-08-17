@extends('layouts.helloapp')

@section('title', 'Delete')

@section('menubar')
    @parent
    削除ページ
@endsection

@section('content')
    <table>
        <tr>
            <th>name: </th>
            <td>{{ $form->name }}</td>
        </tr>
        <tr>
            <th>email: </th>
            <td>{{ $form->email }}</td>
        </tr>
        <tr>
            <th>age: </th>
            <td>{{ $form->age }}</td>
        </tr>
    </table>
    <form action="/hello/del" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $form->id }}">
        <div><input type="submit" value="send"></div>
    </form>
@endsection

@section('footer')
    copyright 2025 tuyano.
@endsection
