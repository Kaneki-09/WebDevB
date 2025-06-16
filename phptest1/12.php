<?php
// 教科書p164からを参照に授業に使っているデータベース「sample_db」に新しいテーブル「members」を4カラムで作成して、メンバーを追加できる仕組みを制作してください。登録フォームは下記のコードを使用してください。
// id（A_Iにチェック）
// affiliation（20文字まで）
// name（15文字まで）
// age（3桁まで）
// 初期データは、https://docs.google.com/spreadsheets/d/1ppbvVnbIGd_chK3EGZzChT4LE4H0duCCe484xIXO9c8/edit?usp=sharing
// を.csvにダウンロードしてインポートさせてください。
// functions.phpは授業で利用しているものを複製して使用
// DBのパスワードはテーブルを追加しただけなので、変わらないです。（理解できていますか？）
// エラーハンドリングやバリデーションも頑張って追加してください。
// ほぼ、教科書通りです。

require_once './functions.php';
