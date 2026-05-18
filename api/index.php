<?php

$_SERVER['APP_DEBUG'] = 'true';
$_ENV['APP_DEBUG'] = 'true';

// 1. Paksa Vercel nulis file cache & manifest ke folder /tmp (SOLUSI LAYAR MERAH)
$_SERVER['APP_CONFIG_CACHE'] = '/tmp/config.php';
$_SERVER['APP_EVENTS_CACHE'] = '/tmp/events.php';
$_SERVER['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
$_SERVER['APP_ROUTES_CACHE'] = '/tmp/routes.php';
$_SERVER['APP_SERVICES_CACHE'] = '/tmp/services.php';

// 2. Siapkan folder /tmp Vercel buat nyimpen file Blade dan Storage
$tmpStorage = '/tmp/storage';
$dirs = [
    "$tmpStorage/framework/views",
    "$tmpStorage/framework/cache",
    "$tmpStorage/framework/sessions",
    "$tmpStorage/logs"
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// 3. Paksa Laravel pakai folder /tmp yang udah kita bikin
$_SERVER['LARAVEL_STORAGE_PATH'] = $tmpStorage;
$_ENV['LARAVEL_STORAGE_PATH'] = $tmpStorage;
$_SERVER['VIEW_COMPILED_PATH'] = "$tmpStorage/framework/views";
$_ENV['VIEW_COMPILED_PATH'] = "$tmpStorage/framework/views";

// 4. Bypass Database MySQL lokal ke SQLite sementara
$_SERVER['DB_CONNECTION'] = 'sqlite';
$_SERVER['DB_DATABASE'] = '/tmp/database.sqlite';
if (!file_exists('/tmp/database.sqlite')) {
    file_put_contents('/tmp/database.sqlite', '');
}

// 5. Jalankan Aplikasi Laravel
require __DIR__ . '/../public/index.php';
