<?php

$players = [
    ["rank" => 1, "name" => "山本",     "team" => "ドジャース",   "era" => 1.80],
    ["rank" => 2, "name" => "ルサルド", "team" => "フィリーズ",   "era" => 2.11],
    ["rank" => 3, "name" => "ペラルタ", "team" => "ブリュワーズ", "era" => 2.18],
    ["rank" => 4, "name" => "キング",   "team" => "パドレス",     "era" => 2.22],
    ["rank" => 5, "name" => "キャニング", "team" => "メッツ",    "era" => 2.357],
];

//foreach文を使って選手の名前を表示させたい
foreach ($players as $player) {
    echo $player["name"], "\n";
}

//防御率が2.2以下の選手を表示させたい
//$playersの要素の数だけループします。
//asのあとの$playerは、$playerの要素を一つずつ
foreach ($players as $player) {
    if ($player["era"] <= 2.2) {
        echo $player["name"], "\n";
    }
}

?>

<?php
//サンリオのキャラクターを2列で作成してください。

$characters = [
    [
        "name" => "ハローキティ",
        "age" => 48,
        "team" => "Sanrio Originals"
    ],
    [
        "name" => "マイメロディ",
        "age" => 49,
        "team" => "My Melody Family"
    ],
    [
        "name" => "シナモロール",
        "age" => 22,
        "team" => "シナモンフレンズ"
    ],
    [
        "name" => "ポムポムプリン",
        "age" => 28,
        "team" => "ポムポム仲間"
    ],
    [
        "name" => "クロミ",
        "age" => 18,
        "team" => "マイメロディファミリー"
    ],
    [
        "name" => "けろけろけろっぴ",
        "age" => 35,
        "team" => "けろけろ村"
    ]
];

//foreach文を使ってキャラクターの年齢を表示させたい
foreach ($characters as $character) {
    echo $character["name"] . " の年齢は " . $character["age"] . " 歳です。\n";
}

//foreach文を使ってキャラクターの名前を表示させたい
foreach ($characters as $character) {
    foreach ($character as $key => $value) {
        if ($key == "name") {
            echo $value . "\n";
        }
    }
}
?>