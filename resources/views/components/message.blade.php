<div style="border: solid 1px gray; paddin: 0px 10px; margin: 10px 0;">
    <p style="color:red; "> Message component</p>
    <p style="font-size: 12pt;">{{ $msg }}</p>
    <hr />
    <div style="margin:0 100px; font-size: 12pt; color: blue;">
        {{ $slot }}
    </div>
    <hr />
    <ul>
        <li>[id] {{ $data['id'] }}</li>
        <li>[id] {{ $data['title'] }}</li>
        <li>[id] {{ $data['body'] }}</li>
    </ul>
</div>
