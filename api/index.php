<?php

$_SERVER['APP_CONFIG_CACHE'] = '/tmp/config.php';
$_SERVER['APP_EVENTS_CACHE'] = '/tmp/events.php';
$_SERVER['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
$_SERVER['APP_ROUTES_CACHE'] = '/tmp/routes.php';
$_SERVER['APP_SERVICES_CACHE'] = '/tmp/services.php';

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

$_SERVER['LARAVEL_STORAGE_PATH'] = $tmpStorage;
$_ENV['LARAVEL_STORAGE_PATH'] = $tmpStorage;

$_SERVER['VIEW_COMPILED_PATH'] = "$tmpStorage/framework/views";
$_ENV['VIEW_COMPILED_PATH'] = "$tmpStorage/framework/views";

$_SERVER['SESSION_DRIVER'] = 'file';
$_ENV['SESSION_DRIVER'] = 'file';

$_SERVER['CACHE_STORE'] = 'file';
$_ENV['CACHE_STORE'] = 'file';

$_SERVER['QUEUE_CONNECTION'] = 'sync';
$_ENV['QUEUE_CONNECTION'] = 'sync';

require __DIR__ . '/../public/index.php';
