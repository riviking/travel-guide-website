<?php
include('includes/db.php');
include('includes/auth.php');
require_user_login();

$placeId = (int) ($_POST['place_id'] ?? 0);

if ($placeId <= 0) {
    header('Location: places.php');
    exit();
}

$userId = current_user_id();
$check = $conn->prepare('SELECT id FROM saved_places WHERE user_id = ? AND place_id = ? LIMIT 1');
$check->bind_param('ii', $userId, $placeId);
$check->execute();
$existing = $check->get_result()->fetch_assoc();

if ($existing) {
    $delete = $conn->prepare('DELETE FROM saved_places WHERE id = ? AND user_id = ?');
    $delete->bind_param('ii', $existing['id'], $userId);
    $delete->execute();
} else {
    $insert = $conn->prepare('INSERT INTO saved_places (user_id, place_id) VALUES (?, ?)');
    $insert->bind_param('ii', $userId, $placeId);
    $insert->execute();
}

header('Location: place-details.php?id=' . $placeId);
exit();
?>
