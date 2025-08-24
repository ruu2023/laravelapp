<!DOCTYPE html>
<html>

<head>
    <title>Hello Register</title>
    <style>
        /* CSSはログインページと同じものを流用 */
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

        .error {
            color: red;
            font-size: 9pt;
        }
    </style>
</head>

<body>
    <h1>Register page</h1>
    <form action="/hello/registerPost" method="post">
        @csrf
        <label>name:</label>
        <div><input type="text" name="name" value="{{ old('name') }}"></div>
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>email:</label>
        <div><input type="text" name="email" value="{{ old('email') }}"></div>
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>password:</label>
        <div><input type="password" name="password"></div>
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>password (confirm):</label>
        <div><input type="password" name="password_confirmation"></div>

        <div><button>Register</button></div>
    </form>
</body>

</html>
