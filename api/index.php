<?php

// ======================================================
// DEBUG
// ======================================================

$_SERVER['APP_DEBUG'] = 'true';
$_ENV['APP_DEBUG'] = 'true';

// ======================================================
// CACHE PATHS (Vercel Serverless)
// ======================================================

$_SERVER['APP_CONFIG_CACHE']   = '/tmp/config.php';
$_SERVER['APP_EVENTS_CACHE']   = '/tmp/events.php';
$_SERVER['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
$_SERVER['APP_ROUTES_CACHE']   = '/tmp/routes.php';
$_SERVER['APP_SERVICES_CACHE'] = '/tmp/services.php';

// ======================================================
// STORAGE PATHS
// ======================================================

$tmpStorage = '/tmp/storage';

$dirs = [
    "$tmpStorage/framework/views",
    "$tmpStorage/framework/cache",
    "$tmpStorage/framework/sessions",
    "$tmpStorage/framework/testing",
    "$tmpStorage/logs"
];

foreach ($dirs as $dir) {

    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// ======================================================
// FORCE LARAVEL STORAGE
// ======================================================

$_SERVER['LARAVEL_STORAGE_PATH'] = $tmpStorage;
$_ENV['LARAVEL_STORAGE_PATH'] = $tmpStorage;

$_SERVER['VIEW_COMPILED_PATH'] = "$tmpStorage/framework/views";
$_ENV['VIEW_COMPILED_PATH'] = "$tmpStorage/framework/views";

// ======================================================
// SESSION & CACHE DRIVER
// IMPORTANT FIX
// ======================================================

$_SERVER['SESSION_DRIVER'] = 'file';
$_ENV['SESSION_DRIVER'] = 'file';

$_SERVER['CACHE_STORE'] = 'file';
$_ENV['CACHE_STORE'] = 'file';

$_SERVER['QUEUE_CONNECTION'] = 'sync';
$_ENV['QUEUE_CONNECTION'] = 'sync';

// ======================================================
// OPTIONAL SQLITE
// HANYA jika memang pakai database
// ======================================================

// $_SERVER['DB_CONNECTION'] = 'sqlite';
// $_SERVER['DB_DATABASE'] = '/tmp/database.sqlite';

// if (!file_exists('/tmp/database.sqlite')) {
//     file_put_contents('/tmp/database.sqlite', '');
// }

// ======================================================
// RUN LARAVEL
// ======================================================

require __DIR__ . '/../public/index.php';
