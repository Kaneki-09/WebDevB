<?php
$name = [
    0 => '佐藤',
    1 => '鈴木',
    2 => '高橋',
];
var_dump($name);

echo $name[2];

$name2 = array(
    0 => '田中',
    1 => '伊藤',
    2 => '渡辺'
);
var_dump($name2);

for ($i = 0; $i < count($name2); $i++) {
    echo $name2[$i] . "<br>";
}

$name3 = ['木下', '遠山', '向井'];
var_dump($name3);
