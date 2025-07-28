<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../models/post.php';
require_once __DIR__ . '/../../functions.php';

// DB接続
$pdo = new PDO($config['dsn'], $config['user'], $config['pass']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
    $reveal_date = $_POST['reveal_date'] ?? '';
    $email = trim($_POST['email'] ?? '');
    $is_public = isset($_POST['is_public']) ? 1 : 0;
    $password_hash = '';

    if (!empty($_POST['password'])) {
        $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

    if (!$message || !$reveal_date || strtotime($reveal_date) < strtotime(date('Y-m-d'))) {
        die('Invalid input or reveal date must be in the future.');
    }

    $stmt = $pdo->prepare("INSERT INTO future_messages (name, message, reveal_date, email, is_public, password_hash) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $message, $reveal_date, $email, $is_public, $password_hash]);

    $errors = validate_post($name, $comment, $reveal_date, $email, $is_public, $password_hash);

    if (empty($errors)) {
        insert_post($pdo, $name, $comment);
        header('Location: ' . $_SERVER['PHP_SELF']);

        header('Location: index.php');
        exit;
    }
}
$posts = get_all_posts($pdo);
require __DIR__ . '/../views/layout.php';
