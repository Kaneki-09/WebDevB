<?php

# 1. 配列 ['赤', '青', '黄'] を作成し、foreach で各要素を1行ずつ表示してください。
$a = ['赤', '青', '黄'];
foreach ($a as $value) {
    echo $value . "<br>";
}

# 2. ['りんご' => 150, 'バナナ' => 120, 'みかん' => 100] の配列から「フルーツ名：価格円」と表示してください。

$fruits = ['りんご' => 150, 'バナナ' => 120, 'みかん' => 100];
foreach ($fruits as $fruit => $price) {
    echo "フルーツ名：$fruit 価格：$price 円<br>";
}

# 3. [100, 200, 300] という配列の合計値を求めて表示してください（foreach を使って）。

$numbers = [100, 200, 300];
$sum = 0;
foreach ($numbers as $value) {
    $sum += $value;
};
echo $sum . "<br>";

# 4. ['PHP', 'JavaScript', 'Python'] という配列に foreach を使って、インデックス番号と一緒に表示してください（例: 0: PHP）。

$programming_languages = ['PHP', 'JavaScript', 'Python'];
foreach ($programming_languages as $index => $language) {
    echo "$index: $language<br>";
}
# 5. ['A', 'B', 'C'] の各要素に「さん」を付けて表示してください（例: Aさん）。

$names = ['A', 'B', 'C'];
foreach ($names as $name) {
    echo "$name さん<br>";
};


# 6. [10, 20, 30] の各値を2倍にして出力してください。
$num = [10, 20, 30];
foreach ($num as $num) {
    echo $num * 2 . "<br>";
};

## 配列でサンリオのキャラクターを20個で作成してください。
$sanrio_characters = [
    'ハローキティ',
    'マイメロディ',
    'シナモロール',
    'ポムポムプリン',
    'リトルツインスターズ',
    'ぐでたま',
    'バッドばつ丸',
    'けろけろけろっぴ',
    'タキシードサム',
    'クロミ',
    'ポチャッコ',
    'あひるのペックル',
    'ウィッシュミーメル',
    'キキララ',
    'フラワーシャワー',
    'マロンクリーム',
    'ハンギョドン',
    'チアリーチャム',
    'タキシードサム',
    'バッドばつ丸'
];
foreach ($sanrio_characters as $characters) {
    echo "$characters" . "<br>";
}
