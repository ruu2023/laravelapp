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

    nav div {
        margin: 0px;
        font-size: 12pt;
    }

    tr th a:link {
        color: white;
    }

    tr th a:visited {
        color: white;
    }

    tr th a:hover {
        color: white;
    }

    tr th a:active {
        color: white;
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
            <th><a href="/hello?sort=name">Name</a></th>
            <th><a href="/hello?sort=email">Mail</a></th>
            <th><a href="/hello?sort=age">Age</a></th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->age }}</td>
            </tr>
        @endforeach
    </table>
    {{ $items->appends(['sort' => $sort])->links() }}
@endsection

@section('footer')
    copyright 20205 tuyono.
@endsection
