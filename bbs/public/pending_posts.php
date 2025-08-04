<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$config = require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/models/future_post.php';
require_once __DIR__ . '/../functions.php';

// DB接続
try {
    $pdo = new PDO($config['dsn'], $config['user'], $config['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log('Connection error: ' . $e->getMessage());
    die('データベースに接続できませんでした。');
}

$pending_posts = get_pending_future_posts($pdo);

$view_to_include = __DIR__ . '/../app/views/pending_posts_view.php';
require __DIR__ . '/../app/views/layout.php';
