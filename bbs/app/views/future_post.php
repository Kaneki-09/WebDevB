<div class="future-m-form">
    <h1>🌟 未来へのメッセージ</h1>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
                <p><?= str2html($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <p>
            <label for="name">名前：</label>
            <input type="text" id="name" name="name" value="<?= str2html($_POST['name'] ?? '') ?>" />
        </p>
        <p>
            <label for="comment">未来へのメッセージ：</label>
            <textarea id="comment" name="comment"><?= str2html($_POST['comment'] ?? '') ?></textarea>
        </p>
        <p>
            <label for=" future_date">公開予定日：</label>
            <input type="date" id="future_date" name="future_date"
                min="<?= date('Y-m-d', strtotime('+1 day')) ?>"
                value="<?= str2html($_POST['future_date'] ?? '') ?>" />
        </p>
        <p>
            <button type="submit" class="btn">未来へ投稿する ✨</button>
            <a href="index.php" class="btn">戻る</a>
        </p>
    </form>
</div>