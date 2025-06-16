<?php

require_once 'functions.php';
greet();
if (function_exists('str2html')) {
    echo str2html("こんにちは！");
} else {
    echo "関数が存在しません。";
}
