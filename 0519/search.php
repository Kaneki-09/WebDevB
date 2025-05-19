<?php
require_once('function.php');

$fp = fopen('songs.csv', 'r');

$search = isset($_POST['song']) ? $_POST['song'] : '';
$found = false;

while ($row = fgetcsv($fp)) {
    $rowString = implode(' ', $row); // 1行を1つの文字列にまとめる
    // 検索語が空欄なら全件表示、またはどれかの単語が含まれていれば表示
    if ($search === '' || mb_stripos($rowString, $search) !== false) {
        echo '<ul>';
        echo '<li>' . "曲名：" . str2html($row[0]) . '</li>';
        echo '<li>' . "アーティスト名：" . str2html($row[1]) . '</li>';
        echo '<li>' . "ジャンル：" . str2html($row[2]) . '</li>';
        echo '<li>' . "リリース年：" . str2html($row[3]) . '</li>';
        echo '<li>' . "メモ：" . str2html($row[4]) . '</li>';
        echo '</ul>';
        $found = true;
    }
}

if (!$found) {
    echo '該当する曲が見つかりませんでした。';
}

fclose($fp);
