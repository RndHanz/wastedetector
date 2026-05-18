<?php

// 1. Buka paksa mode Debug biar kalau eror kelihatan jelas teks aslinya!
$_SERVER['APP_DEBUG'] = 'true';
$_ENV['APP_DEBUG'] = 'true';

// 2. Siapkan folder /tmp Vercel buat nyimpen file Blade (karena Vercel aslinya Read-Only)
$tmpStorage = '/tmp/storage';
$dirs = [
    "$tmpStorage/framework/views",
    "$tmpStorage/framework/cache",
    "$tmpStorage/framework/sessions",
    "$tmpStorage/logs"
];

// Otomatis bikin foldernya kalau belum ada
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// 3. Paksa Laravel pakai folder /tmp yang udah kita bikin buat nampilin views
$_SERVER['LARAVEL_STORAGE_PATH'] = $tmpStorage;
$_ENV['LARAVEL_STORAGE_PATH'] = $tmpStorage;
$_SERVER['VIEW_COMPILED_PATH'] = "$tmpStorage/framework/views";
$_ENV['VIEW_COMPILED_PATH'] = "$tmpStorage/framework/views";

// 4. Bypass Database MySQL lokal ke SQLite sementara biar web bisa nampil dulu
$_SERVER['DB_CONNECTION'] = 'sqlite';
$_SERVER['DB_DATABASE'] = '/tmp/database.sqlite';
if (!file_exists('/tmp/database.sqlite')) {
    file_put_contents('/tmp/database.sqlite', '');
}

// 5. Jalankan Aplikasi Laravel
require __DIR__ . '/../public/index.php';
