<div class="container mt-5">
    <h1 class="text-center mb-4 display-4 animate__animated animate__fadeInDown">📬 公開された未来のメッセージ</h1>

    <?php if (!empty($revealed_posts)): ?>
        <div class="row">
            <?php foreach ($revealed_posts as $post): ?>
                <div class="col-md-6 mb-4 animate__animated animate__fadeInUp">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><strong><?= str2html($post['name']) ?></strong> さん</h5>
                            <p class="card-text lead"><?= nl2br(str2html($post['comment'])) ?></p>
                        </div>
                        <div class="card-footer text-right">
                            <small class="text-muted">公開日: <?= str2html($post['reveal_date']) ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center animate__animated animate__fadeIn" role="alert">
            まだ公開されたメッセージはありません。
        </div>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-primary btn-lg">トップに戻る</a>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>