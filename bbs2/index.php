<?php
require 'db.php';
echo "<link rel='stylesheet' href='style.css'>";
echo "<h1>🌟 未来メッセージ掲示板</h1>";
echo "<a href='post.php' class='btn'>✍️ 新規投稿</a>";

$stmt = $pdo->prepare("SELECT * FROM future_messages WHERE is_public = 1 ORDER BY reveal_date DESC");
$stmt->execute();
$messages = $stmt->fetchAll();
$date_today = date('Y-m-d');

foreach ($messages as $msg) {
    $is_revealed = ($msg['reveal_date'] <= $date_today);
    echo "<div class='card'>";
    echo "<p><strong>📅 Reveal Date:</strong> " . htmlspecialchars($msg['reveal_date']) . "</p>";
    echo "<p><strong>👤 From:</strong> " . htmlspecialchars($msg['name'] ?? 'Anonymous') . "</p>";

    if ($is_revealed && empty($msg['password_hash'])) {
        echo "<p>\uD83D\uDCDD " . nl2br(htmlspecialchars($msg['comment'])) . "</p>";
    } elseif (!$is_revealed) {
        echo "<p>🔒 Message will unlock on " . htmlspecialchars($msg['reveal_date']) . "</p>";
    } else {
        echo "<p>🔐 This message is password protected.</p>";
    }

    echo "<a href='view.php?id={$msg['id']}' class='btn'>View</a>";
    echo "</div>";
}
