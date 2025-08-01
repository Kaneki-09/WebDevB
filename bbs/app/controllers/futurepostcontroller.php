<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../models/future_post.php';
require_once __DIR__ . '/../../functions.php';

// DB接続
$pdo = new PDO($config['dsn'], $config['user'], $config['pass']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $comment = trim($_POST['comment'] ?? '');
    $future_date = trim($_POST['future_date'] ?? '');

    // バリデーション
    if ($name === '') {
        $errors[] = '名前を入力してください。';
    }
    if ($comment === '') {
        $errors[] = 'メッセージを入力してください。';
    }
    if ($future_date === '') {
        $errors[] = '公開予定日を選択してください。';
    } else {
        $selected_date = strtotime($future_date);
        $tomorrow = strtotime(date('Y-m-d', strtotime('+1 day')));
        if ($selected_date < $tomorrow) {
            $errors[] = '公開予定日は明日以降の日付を選択してください。';
        }
    }

    if (empty($errors)) {
        insert_future_post($pdo, $name, $comment, $future_date);
        header('Location: index.php');
        exit;
    }
}

// ビューの読み込み
require __DIR__ . '/../views/future_post.php';
