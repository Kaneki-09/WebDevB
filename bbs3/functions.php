<?php
function sanitizeInput($data)
{
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function isRevealed($reveal_date)
{
    return date('Y-m-d') >= $reveal_date;
}

function formatDate($date, $format = 'Y年m月d日')
{
    return date($format, strtotime($date));
}

function validateDate($date)
{
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date && $date > date('Y-m-d');
}
