<?php
session_start();
$config = require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../functions.php';
require_once __DIR__ . '/../app/models/post.php';

// DB接続
try {
    $pdo = new PDO($config['dsn'], $config['user'], $config['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log('Connection error: ' . $e->getMessage());
    die('データベースに接続できませんでした。');
}

// バリデーション関数
function validate_post(string $name, string $comment): array
{
    $errors = [];
    if ($name === '') {
        $errors[] = '名前を入力してください。';
    }
    if ($comment === '') {
        $errors[] = 'コメントを入力してください。';
    }
    return $errors;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $comment = trim($_POST['comment'] ?? '');

    $errors = validate_post($name, $comment);

    if (empty($errors)) {
        insert_post($pdo, $name, $comment);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

$posts = get_all_posts($pdo);
$view_to_include = __DIR__ . '/../app/views/index.php';
require __DIR__ . '/../app/views/layout.php';