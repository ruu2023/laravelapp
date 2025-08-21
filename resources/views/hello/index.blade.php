@extends('layouts.helloapp')
<style>
    nav {
        margin: 10px 0px;
    }

    nav span {
        margin: 5px;
        font-size: 12pt;
    }

    nav a {
        margin: 5px;
        font-size: 12pt;
    }
</style>

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
        <tr>
            <th>Name</th>
            <th>Mail</th>
            <th>Age</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->age }}</td>
            </tr>
        @endforeach
    </table>
    {{ $items->links() }}
@endsection

@section('footer')
    copyright 20205 tuyono.
@endsection
