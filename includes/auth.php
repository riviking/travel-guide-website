<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function is_user_logged_in(): bool
{
    return !empty($_SESSION['user_id']);
}

function current_user_id(): ?int
{
    return is_user_logged_in() ? (int) $_SESSION['user_id'] : null;
}

function current_user_name(): string
{
    return $_SESSION['user_name'] ?? 'Traveler';
}

function require_user_login(): void
{
    if (!is_user_logged_in()) {
        header('Location: login.php');
        exit();
    }
}

function user_initials(string $name): string
{
    $words = preg_split('/\s+/', trim($name));
    $first = strtoupper(substr($words[0] ?? 'T', 0, 1));
    $second = strtoupper(substr($words[1] ?? '', 0, 1));
    return $first . $second;
}
?>
