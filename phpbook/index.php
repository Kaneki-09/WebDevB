<?php
# list.php
require_once __DIR__ . '/inc/functions.php';
require_once __DIR__ . '/login_check.php';
include __DIR__ . '/inc/header.php';

try {
    $dbh = db_open();

    // 変数にSQL文を代入
    $sql = 'SELECT * FROM books';
    // SQL文を実行⇨結果を変数に代入配列で取得
    $statement = $dbh->query($sql);
?>

    <table border="1">
        <tr>
            <th>更新</th>
            <th>書籍名</th>
            <th>ISBN</th>
            <th>価格</th>
            <th>出版日</th>
            <th>著者名</th>
        </tr>

        <?php while ($row = $statement->fetch()): ?>
            <tr>
                <td><a href="edit.php?id=<?php echo str2html($row['id']); ?>">更新</a></td>
                <td><?php echo str2html($row['title']); ?></td>
                <td><?php echo str2html($row['isbn']); ?></td>
                <td><?php echo str2html($row['price']); ?></td>
                <td><?php echo str2html($row['publish']); ?></td>
                <td><?php echo str2html($row['author']); ?></td>
            </tr>
            <!-- echo "書籍名:" . str2html($row[0]) . "<br>";
            echo "著者名:" . str2html($row[1]) . "<br>"; -->
        <?php endwhile; ?>
    </table>


<?php

    // var_dump($dbh);

} catch (PDOException $e) {
    // 例外をcatchしてエラーメッセージを表示
    echo 'エラー!:' . str2html($e->getMessage()) . "<br>";
    exit;
}
?>
<?php include __DIR__ . '/inc/footer.php'; ?>