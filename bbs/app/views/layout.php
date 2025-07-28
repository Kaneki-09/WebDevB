<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1>掲示板</h1>

    <?php if (!empty($errors)): ?>
        <ul style="color:red;">
            <?php foreach ($errors as $error): ?>
                <li><?= str2html($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php
    // Only include the relevant view
    if (basename($_SERVER['SCRIPT_NAME']) === 'future_post.php') {
        include __DIR__ . '/future_post.php';
    } else {
        include __DIR__ . '/index.php';
    }
    ?>
</body>

</html>