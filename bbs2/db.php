<?php
// db.php - Database connection file
$dsn = 'mysql:host=localhost;dbname=bbs_db;charset=utf8';
$user = 'bbs_user';
$pass = 'Kaneki109';

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
