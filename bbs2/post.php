<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db.php';
    $name = htmlspecialchars($_POST['name'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    $reveal_date = $_POST['reveal_date'] ?? '';
    $email = htmlspecialchars($_POST['email'] ?? '');
    $is_public = isset($_POST['is_public']) ? 1 : 0;
    $password_hash = '';

    if (!empty($_POST['password'])) {
        $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

    if (!$message || !$reveal_date || strtotime($reveal_date) < strtotime(date('Y-m-d'))) {
        die('Invalid input or reveal date must be in the future.');
    }

    $stmt = $pdo->prepare("INSERT INTO future_messages (name, comment, reveal_date, email, is_public, password_hash) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $message, $reveal_date, $email, $is_public, $password_hash]);

    header('Location: index.php');
    exit;
} else {
    echo "<link rel='stylesheet' href='style.css'>";
    echo "<h2>✍️ Write Your Future Message</h2>";
    echo "<form method='post' class='form'>
        <label>Name (optional): <input type='text' name='name'></label>
        <label>Message: <textarea name='message' required></textarea></label>
        <label>Reveal Date: <input type='date' name='reveal_date' required></label>
        <label>Email (optional): <input type='email' name='email'></label>
        <label>Password (optional): <input type='password' name='password'></label>
        <label><input type='checkbox' name='is_public' checked> Make this message public</label>
        <button type='submit' class='btn'>Submit</button>
    </form>";
}
