<?php
require_once 'db.php';
require_once 'functions.php';

$id = $_GET['id'] ?? 0;
$password_error = false;

$stmt = $pdo->prepare("SELECT * FROM messages WHERE id = ?");
$stmt->execute([$id]);
$message = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$message) {
    header('Location: index.php');
    exit;
}

// Handle password verification
if ($message['password_hash'] && $_POST) {
    $entered_password = $_POST['password'] ?? '';
    if (!password_verify($entered_password, $message['password_hash'])) {
        $password_error = true;
    }
}

$needs_password = $message['password_hash'] && !$_POST;
$wrong_password = $message['password_hash'] && $password_error;
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>メッセージ詳細</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php if ($needs_password || $wrong_password): ?>
        <form method="POST">
            <h2>パスワードが必要です</h2>
            <?php if ($wrong_password): ?>
                <p class="error">パスワードが間違っています</p>
            <?php endif; ?>
            <input type="password" name="password" placeholder="パスワードを入力" required>
            <button type="submit">確認</button>
        </form>
    <?php elseif (!isRevealed($message['reveal_date'])): ?>
        <div class="locked">
            <h2>🔒 まだ公開されていません</h2>
            <p>公開日: <?= formatDate($message['reveal_date']) ?></p>
            <div class="countdown" data-date="<?= $message['reveal_date'] ?>"></div>
        </div>
    <?php else: ?>
        <article class="message-detail">
            <h2><?= $message['name'] ? sanitizeInput($message['name']) : '匿名' ?>からのメッセージ</h2>
            <div class="message-content">
                <?= nl2br(sanitizeInput($message['message'])) ?>
            </div>
            <div class="message-meta">
                <p>投稿日: <?= formatDate($message['created_at']) ?></p>
                <p>公開日: <?= formatDate($message['reveal_date']) ?></p>
            </div>
            <button onclick="shareMessage()">シェア</button>
        </article>
    <?php endif; ?>

    <a href="index.php">ホームに戻る</a>
    <script src="js/script.js"></script>
</body>

</html>