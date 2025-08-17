@extends('layouts.helloapp')

@section('title', 'Show')

@section('menubar')
    @parent
    詳細ページ
@endsection

@section('content')
    @if ($items != null)
        @foreach ($items as $item)
            <table>
                <tr>
                    <th>id: </th>
                    {{-- <td>{{ $item->id }}</td> --}}

                    <th>name: </th>
                    <td>{{ $item->name }}</td>

                    <th>email: </th>
                    <td>{{ $item->email }}</td>

                    <th>age: </th>
                    <td>{{ $item->age }}</td>
                </tr>
            </table>
            <a href="/hello/edit?id={{ $item->id }}">編集</a>
        @endforeach
    @endif
@endsection

@section('footer')
    copyright 2025 tuyano.
@endsection
