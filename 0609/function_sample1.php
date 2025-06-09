<?php
function test()
{
    // ローカル変数{}内の変数
    $a = 10;
    return $a; // 関数の戻り値
}
$a = test(); // 関数の実行、$a関数に戻り値を代入
echo $a;
