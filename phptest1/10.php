<?php
// 以下のフォームから送信された値（name と comment）をPHPで受け取り、
// 〇〇さんのコメント：〇〇
// と表示するコードを書いてください。
echo $_POST['name'] . "さんのコメント：" . $_POST['comment'] . "<br>";
