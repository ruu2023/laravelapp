<html>

<head>
    <title>Hello login</title>
    <style>
        label {
            font-size: 10pt;
            font-weight: bold;
        }

        input {
            padding: 5px 10px;
            margin-bottom: 10px;
        }

        button {
            padding: 5px 10px;
            font-size: 12pt;
            color: white;
            background-color: darkblue;
        }
    </style>
</head>

<body>
    <h1>login page</h1>
    <form action="/hello/loginPost" method="post">
        @csrf
        <label>email:</label>
        <div><input type="text" name='email'></div>
        <label>password:</label>
        <div><input type="password" name='password'></div>
        <div><button>Login</button></div>
    </form>
</body>

</html>
