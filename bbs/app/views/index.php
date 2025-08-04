<div class="container mt-5">
    <h1 class="text-center mb-4 display-4 animate__animated animate__fadeInDown">🌟 未来メッセージ掲示板</h1>
    <div class="text-center mb-4">
        <a href='./future_post.php' class='btn btn-primary btn-lg animate__animated animate__pulse'>✍️ 新規投稿</a>
        <a href='./revealed_posts.php' class='btn btn-success btn-lg animate__animated animate__pulse'>📬 公開された投稿</a>
        <a href='./pending_posts.php' class='btn btn-info btn-lg animate__animated animate__pulse'>⏳ 公開待ちの投稿</a>
    </div>

    <hr class="my-4" />

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm mb-5 animate__animated animate__fadeInUp">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">新しいメッセージを投稿</h3>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="あなたの名前" required />
                        </div>
                        <div class="form-group">
                            <label for="comment">コメント</label>
                            <textarea name="comment" id="comment" rows="5" class="form-control" placeholder="メッセージを入力してください" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">投稿</button>
                    </form>
                </div>
            </div>

            <h2 class="mb-4 animate__animated animate__fadeInLeft">最新の投稿</h2>
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="card mb-3 animate__animated animate__fadeInRight">
                        <div class="card-body">
                            <h5 class="card-title"><strong><?= str2html($post['name']) ?></strong> さん</h5>
                            <p class="card-text lead"><?= nl2br(str2html($post['comment'])) ?></p>
                            <p class="card-text text-right"><small class="text-muted">投稿日時: <?= str2html($post['created_at']) ?></small></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-info animate__animated animate__fadeIn" role="alert">
                    まだ投稿はありません。
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>