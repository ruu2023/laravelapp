<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

global $head, $style, $body, $end;

$head = '<html><head>';
$style = <<<EOF
<style>
body {font-size: 16pt; color: #999;}
h1 {font-size: 100pt; text-align: right; color: #eee; margin: -40px 0px -50px 0px;}
</style>
EOF;
$body = '</head><body>';
$end = '</body></html>';

function tag($tag, $txt) {
    return "<{$tag}>" . $txt . "</{$tag}>";
}


class HelloController extends Controller
{
    public function index(Request $request ) {
        return view('hello.index', ['msg' => 'フォームを入力：']);
    }

    public function post(Request $request)
    {
        $validate_rule = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0, 150',
        ];
        $request->validate($validate_rule);
        return view('hello.index',['msg' => '正しく入力されました！']);
    }

    public function other() {
        global $head, $style, $body, $end;
        $html = $head . tag('title', 'Hello/other')
                . $style . $body . tag('h1', 'Other')
                . tag('p', 'this is Other page')
                . '<a href="/hello">go to index page</a>'
                . $end;
        return $html;
    }
}
