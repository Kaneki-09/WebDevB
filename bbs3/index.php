<?php
require_once 'db.php';
require_once 'functions.php';

// Get all public messages
$stmt = $pdo->query("SELECT * FROM messages WHERE is_public = 1 ORDER BY reveal_date DESC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>未来メッセージ掲示板</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header>
        <h1>未来メッセージ掲示板</h1>
        <a href="post.php">メッセージを作成</a>
    </header>

    <main>
        <?php foreach ($messages as $message): ?>
            <div class="message-card">
                <?php if (isRevealed($message['reveal_date'])): ?>
                    <h3><?= $message['name'] ? sanitizeInput($message['name']) : '匿名' ?></h3>
                    <p><?= nl2br(sanitizeInput($message['message'])) ?></p>
                    <small>公開日: <?= formatDate($message['reveal_date']) ?></small>
                <?php else: ?>
                    <div class="locked">
                        🔒 <?= formatDate($message['reveal_date']) ?>まで非公開
                        <div class="countdown" data-date="<?= $message['reveal_date'] ?>"></div>
                    </div>
                <?php endif; ?>
                <a href="view.php?id=<?= $message['id'] ?>">詳細を見る</a>
            </div>
        <?php endforeach; ?>
    </main>

    <script src="js/script.js"></script>
</body>

</html>