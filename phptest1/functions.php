<?php

// functions.phpに定義された関数 greet() を読み込んで実行するコードを書いてください。エラーが出たら処理を停止させるようにしてください。

// functions.php
function str2html(string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
function greet() {}


function db_open()
{
    $user = "phpuser";
    $password = "Kaneki@109";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    ];
    $dbh = new PDO('mysql:host=localhost;dbname=sample_db', $user, $password, $opt);

    return $dbh;
}
