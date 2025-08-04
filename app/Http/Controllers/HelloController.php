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
    // public function index(Request $request,Response $response) {
    public function index() {
        // $data = ['msg' => 'これはコントローラーから渡されたメッセージです'];
        // $data = ['one', 'two', 'three', 'four', 'five'];
        $data = [
            ['name' => '山田たろう', 'mail' => 'taro@yamada'],
            ['name' => 'スズキたろう', 'mail' => 'taro@suzuki'],
            ['name' => 'たろう', 'mail' => 'taro@tarou'],
        ];
        return view('hello.index', ['data' =>$data]);
        // $html = <<<EOF
        // <html>
        // <head>
        //     <title>Hello/index</title>
        //     <style>
        //         body {font-size: 16pt; color: #999;}
        //         h1 {font-size: 100pt; text-align: right; color: #eee; margin: -40px 0px -50px 0px;}
        //     </style>
        // </head>
        // <body>
        //     <h1>Hello/index</h1>
        //     <p>this is index page</p>
        //     <h3>Request</h3>
        //     <pre>{$request}</pre>
        //     <pre>{$request->path()}</pre>
        //     <pre>{$request->fullurl()}</pre>
        //     <pre>{$request->url()}</pre>
        //     <h3>Response</h3>
        //     <pre>{$response}</pre>
        //     <a href="/hello/other">go to other page</a>
        // </body>
        // </html>
        // EOF;
        // return $html;

    }

    public function post(Request $request) {
        $msg = $request->msg;
        $data = ['msg' => 'こんにちは' . $msg . 'さん!'];
        return view('hello.index', $data);
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
