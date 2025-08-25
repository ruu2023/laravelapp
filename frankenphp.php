<?php

// public/index.php の内容をベースにしています
// This file is based on the content of public/index.php

define('LARAVEL_START', microtime(true));

// アプリケーションがメンテナンスモードかどうかを判断
if (file_exists($maintenance = __DIR__.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Composerのオートローダーを登録
require __DIR__.'/vendor/autoload.php';

// Laravelアプリケーションのインスタンスを作成して返す
return require_once __DIR__.'/bootstrap/app.php';
