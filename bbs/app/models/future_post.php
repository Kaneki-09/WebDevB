<?php
function insert_future_post(PDO $pdo, string $name, string $comment, string $future_date): void
{
    try {
        $sql = 'INSERT INTO posts (name, comment, reveal_date, is_public, created_at)
                VALUES (:name, :comment, :reveal_date, 1, NOW())';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
        $stmt->bindValue(':reveal_date', $future_date, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        error_log('Error in insert_future_post: ' . $e->getMessage());
        throw $e;
    }
}

function get_revealed_future_posts(PDO $pdo): array
{
    $sql = 'SELECT * FROM posts
            WHERE is_public = 1
            AND reveal_date <= NOW()
            ORDER BY reveal_date DESC';
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_pending_future_posts(PDO $pdo): array
{
    $sql = 'SELECT * FROM posts
            WHERE is_public = 1
            AND reveal_date > NOW()
            ORDER BY reveal_date ASC';
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
