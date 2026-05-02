<?php

/**
 * Laravel - A PHP Framework for Web Artisans
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

// Kalau file yang diminta ada di folder public, langsung tampilkan
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

// Kalau tidak, arahkan ke index.php Laravel
require_once __DIR__.'/public/index.php';
