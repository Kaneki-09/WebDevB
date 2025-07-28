<?php
require 'db.php';
$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM future_messages WHERE id = ?");
$stmt->execute([$id]);
$message = $stmt->fetch();

if (!$message) {
    die('Message not found.');
}

$date_today = date('Y-m-d');
$is_revealed = ($message['reveal_date'] <= $date_today);

if (!$is_revealed) {
    echo "<p>🔒 This message will unlock on " . htmlspecialchars($message['reveal_date']) . "</p>";
    exit;
}

if (!empty($message['password_hash'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input_password = $_POST['password'] ?? '';
        if (password_verify($input_password, $message['password_hash'])) {
            showMessage($message);
        } else {
            echo "<p>❌ Incorrect password.</p>";
            showPasswordForm();
        }
    } else {
        showPasswordForm();
    }
} else {
    showMessage($message);
}

function showMessage($msg)
{
    echo "<link rel='stylesheet' href='style.css'>";
    echo "<div class='card'>";
    echo "<p><strong>📅 Revealed on:</strong> " . htmlspecialchars($msg['reveal_date']) . "</p>";
    echo "<p><strong>👤 From:</strong> " . htmlspecialchars($msg['name'] ?? 'Anonymous') . "</p>";
    echo "<p>📝 " . nl2br(htmlspecialchars($msg['message'])) . "</p>";
    echo "</div>";
}

function showPasswordForm()
{
    echo "<form method='post' class='form'>
        <label>🔐 Enter Password: <input type='password' name='password' required></label>
        <button type='submit' class='btn'>Unlock</button>
    </form>";
}
