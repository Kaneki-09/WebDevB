<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm animate__animated animate__fadeInUp">
                <div class="card-body">
                    <h1 class="card-title text-center mb-4">🌟 未来へのメッセージ</h1>

                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger animate__animated animate__shakeX">
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?= str2html($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">名前：</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="あなたの名前" value="<?= str2html($_POST['name'] ?? '') ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="comment">未来へのメッセージ：</label>
                            <textarea id="comment" name="comment" class="form-control" rows="5" placeholder="未来の自分へのメッセージ" required><?= str2html($_POST['comment'] ?? '') ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="future_date">公開予定日：</label>
                            <input type="date" id="future_date" name="future_date" class="form-control"
                                min="<?= date('Y-m-d', strtotime('+1 day')) ?>"
                                value="<?= str2html($_POST['future_date'] ?? '') ?>" required />
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg animate__animated animate__pulse">未来へ投稿する ✨</button>
                            <a href="index.php" class="btn btn-secondary btn-lg ml-2">戻る</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>