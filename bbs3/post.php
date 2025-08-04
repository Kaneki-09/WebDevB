<?php
require_once 'db.php';
require_once 'functions.php';

$errors = [];
$success = false;

if ($_POST) {
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $message = sanitizeInput($_POST['message'] ?? '');
    $reveal_date = $_POST['reveal_date'] ?? '';
    $password = $_POST['password'] ?? '';
    $is_public = isset($_POST['is_public']) ? 1 : 0;

    // Validation
    if (empty($message)) $errors[] = 'メッセージは必須です';
    if (!validateDate($reveal_date)) $errors[] = '有効な未来の日付を選択してください';

    if (empty($errors)) {
        $password_hash = $password ? password_hash($password, PASSWORD_DEFAULT) : null;

        $stmt = $pdo->prepare("INSERT INTO messages (name, email, message, reveal_date, password_hash, is_public) VALUES (?, ?, ?, ?, ?, ?)");

        if ($stmt->execute([$name, $email, $message, $reveal_date, $password_hash, $is_public])) {
            $success = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>メッセージ作成</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php if ($success): ?>
        <div class="success">メッセージが正常に作成されました！</div>
        <a href="index.php">ホームに戻る</a>
    <?php else: ?>
        <form method="POST">
            <h2>未来へのメッセージを作成</h2>

            <?php if ($errors): ?>
                <div class="errors">
                    <?php foreach ($errors as $error): ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <input type="text" name="name" placeholder="お名前（任意）" value="<?= $_POST['name'] ?? '' ?>">
            <input type="email" name="email" placeholder="メールアドレス（任意）" value="<?= $_POST['email'] ?? '' ?>">
            <textarea name="message" placeholder="未来への メッセージ" required><?= $_POST['message'] ?? '' ?></textarea>
            <input type="date" name="reveal_date" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" required value="<?= $_POST['reveal_date'] ?? '' ?>">
            <input type="password" name="password" placeholder="パスワード（任意）">

            <label>
                <input type="checkbox" name="is_public" <?= isset($_POST['is_public']) ? 'checked' : '' ?>>
                公開する
            </label>

            <button type="submit">メッセージを送信</button>
        </form>
    <?php endif; ?>
</body>

</html>