<html>

<head>
    <title>@yield('title')</title>
    <style>
        body {
            font-size: 16pt;
            color: #777;
        }

        h1 {
            font-size: 40pt;
            text-align: right;
            color: #d0d0f0;
            margin: 20px 0px 0px 0px;
        }

        ul {
            font-size: 12pt;
        }

        hr {
            margin: 25px 100px;
            border-top: 1px dashed #ddd;
        }

        .menutitle {
            font-size: 14pt;
            font-weight: bold;
            margin: 0px;
        }

        .content {
            margin: 10px;
        }

        .footer {
            text-align: right;
            font-size: 10pt;
            margin: 10px;
            border-bottom: solid 1px #ccc;
            color: #ccc;
        }

        th {
            background-color: #999;
            color: #fff;
            padding: 5px 10px;
        }

        td {
            border: solid 1px #aaa;
            color: #999;
            padding: 5px 10px;
        }

        label {
            margin: 0px;
            font-size: 16px;
        }

        input {
            padding: 5px 10px;
            margin: 2px;
        }

        button {
            padding: 5px 20px;
            margin: 2px;
        }
    </style>
</head>

<body>
    <h1>@yield('title')</h1>
    @section('menubar')
        <ul>
            <p class="menutitle">※メニュー</p>
        <li>@show
        </li>
    </ul>
    <hr size="1">
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
    </div>
</body>

</html>
