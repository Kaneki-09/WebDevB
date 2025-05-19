<!-- HTMLのコメント -->
<?php

require_once('function.php');
//一回だけ読み込む
//requireは、読み込まれないとエラーになる→止まる

$fp = fopen('bookdata.csv', 'r');
if ($fp === false) {
    echo 'ファイルのオープンに失敗しました。';
    exit;
}
//書籍名と著者名を表示する
while ($row = fgetcsv($fp)) {
    echo '<ul>';
    echo '<li>' . "書籍名："  . str2html($row[0]) . '</li>';
    echo '<li>' . "著者名："  . str2html($row[4]) . '</li>';
    echo '</ul>';
}

//データを読み込む
$fp = fopen('bookdata.csv', 'r');

//ファイルが開けたが確認
if ($fp === false) {
    echo 'ファイルのオープンに失敗しました。';
    exit;
}

/* 複数行の
コメント */

// $row = fgetcsv($fp);
// 書籍名と著者名を表示する
while ($row = fgetcsv($fp)) {
    echo '<ul>';
    echo '<li>' . "書籍名：" . htmlspecialchars($row[0], ENT_QUOTES, 'UTF-8') . '</li>';
    echo '<li>' . "著者名：" . htmlspecialchars($row[4], ENT_QUOTES, 'UTF-8') . '</li>';
    echo '</ul>';
}
