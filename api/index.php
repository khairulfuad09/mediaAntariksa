<?php

// Menyiapkan folder sementara Vercel untuk penyimpanan cache & views Laravel
$storageFolders = [
    '/tmp/storage/app',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($storageFolders as $folder) {
    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
    }
}

// Override path storage dan bootstrap cache ke /tmp
$_ENV['APP_SERVICES_CACHE'] = '/tmp/bootstrap/cache/services.php';
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/bootstrap/cache/packages.php';
$_ENV['APP_CONFIG_CACHE']   = '/tmp/bootstrap/cache/config.php';
$_ENV['APP_ROUTES_CACHE']   = '/tmp/bootstrap/cache/routes.php';
$_ENV['APP_EVENTS_CACHE']   = '/tmp/bootstrap/cache/events.php';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

// Jalankan aplikasi Laravel
require __DIR__ . '/../public/index.php';