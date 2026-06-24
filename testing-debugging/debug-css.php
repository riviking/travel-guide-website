<?php
include '../includes/db.php';

$projectRoot = dirname(__DIR__);
$place_id = intval($_GET['id'] ?? 0);

$sql = "SELECT p.*, pd.long_description, pd.history, pd.best_time_to_visit, pd.entry_fee, pd.map_link
        FROM places p
        LEFT JOIN place_details pd ON p.id = pd.place_id
        WHERE p.id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $place_id);
$stmt->execute();
$result = $stmt->get_result();
$place = $result->fetch_assoc();

if (!$place) {
    echo "<h2>Place not found</h2>";
    exit;
}

$imageName = $place['image'] ?? '';
$imageName = str_replace('places/thumbs/', '', $imageName);
$imageName = str_replace('places/', '', $imageName);
$bgImage = !empty($imageName)
    ? 'assets/images/places/' . $imageName
    : 'assets/images/places/default.jpg';
$bgImageUrl = '../' . $bgImage;
$bgImagePath = $projectRoot . '/' . $bgImage;

echo "<h2>Debug: CSS being generated</h2>";
echo "<p><strong>Background Image URL:</strong></p>";
echo "<pre style='background:#f0f0f0;padding:10px;'>url('$bgImageUrl')</pre>";

echo "<p><strong>Full CSS that should be applied:</strong></p>";
echo "<pre style='background:#f0f0f0;padding:10px;'>.place-page {
    background-image: url('$bgImageUrl');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}</pre>";

echo "<p><strong>File exists on server?</strong> " . (file_exists($bgImagePath) ? "YES" : "NO") . "</p>";
?>
