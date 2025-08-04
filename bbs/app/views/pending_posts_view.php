<div class="container mt-5">
    <h1 class="text-center mb-4 display-4 animate__animated animate__fadeInDown">⏳ 公開待ちのメッセージ</h1>

    <?php if (!empty($pending_posts)): ?>
        <div class="row">
            <?php foreach ($pending_posts as $post): ?>
                <div class="col-md-6 mb-4 animate__animated animate__fadeInUp">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header text-right">
                            <span class="badge badge-info countdown-badge">あと <span class="countdown" data-reveal-date="<?= $post['reveal_date'] ?>"></span></span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><strong><?= str2html($post['name']) ?></strong> さん</h5>
                            <p class="card-text lead">このメッセージはまだ公開されていません。</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center animate__animated animate__fadeIn" role="alert">
            公開待ちのメッセージはありません。
        </div>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-primary btn-lg">トップに戻る</a>
    </div>
</div>

<script src="/bbs/public/js/countdown.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />