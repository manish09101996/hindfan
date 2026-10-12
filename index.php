<?php
// Forward root folder to public/ in Apache/XAMPP
$uri = $_SERVER['REQUEST_URI'] ?? '/';
if (strpos($uri, '/public') === false) {
    header("Location: " . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . "/public/");
    exit;
}
require_once __DIR__ . '/public/index.php';
