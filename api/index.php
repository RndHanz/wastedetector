<?php

// 1. Paksa Vercel nulis cache dan desain di folder /tmp (satu-satunya yang diizinkan)
$_SERVER['APP_CONFIG_CACHE'] = '/tmp/config.php';
$_SERVER['APP_EVENTS_CACHE'] = '/tmp/events.php';
$_SERVER['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
$_SERVER['APP_ROUTES_CACHE'] = '/tmp/routes.php';
$_SERVER['APP_SERVICES_CACHE'] = '/tmp/services.php';
$_SERVER['VIEW_COMPILED_PATH'] = '/tmp';
$_SERVER['SESSION_DRIVER'] = 'cookie';
$_SERVER['LOG_CHANNEL'] = 'stderr';

// 2. Bypass Database: Mencegah web Error 500 karena nyari MySQL lokal
$_SERVER['DB_CONNECTION'] = 'sqlite';
$_SERVER['DB_DATABASE'] = '/tmp/database.sqlite';
file_put_contents('/tmp/database.sqlite', '');

// 3. Jalankan Website Laravel
require __DIR__ . '/../public/index.php';
