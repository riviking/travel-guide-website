<?php
include '../includes/db.php';

$projectRoot = dirname(__DIR__);
$place_id = intval($_GET['id'] ?? 1);

$sql = "SELECT * FROM places WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $place_id);
$stmt->execute();
$result = $stmt->get_result();
$place = $result->fetch_assoc();

if (!$place) {
    echo "<h2>Place not found</h2>";
    exit;
}

echo "<h2>Debug: Place Image Path</h2>";
echo "<p><strong>Place ID:</strong> $place_id</p>";
echo "<p><strong>Place Name:</strong> " . htmlspecialchars($place['name']) . "</p>";
echo "<p><strong>DB Image:</strong> " . htmlspecialchars($place['image']) . "</p>";

$imageName = $place['image'] ?? '';
$imageName = str_replace('places/thumbs/', '', $imageName);
$imageName = str_replace('places/', '', $imageName);
$bgImage = !empty($imageName)
    ? 'assets/images/places/' . $imageName
    : 'assets/images/places/default.jpg';

echo "<p><strong>Constructed Path:</strong> " . htmlspecialchars($bgImage) . "</p>";
echo "<p><strong>Full Server Path:</strong> " . htmlspecialchars($projectRoot . '/' . $bgImage) . "</p>";

$fullPath = $projectRoot . '/' . $bgImage;
echo "<p><strong>File Exists?</strong> " . (file_exists($fullPath) ? "YES" : "NO") . "</p>";

echo "<h3>Testing different variations:</h3>";
$paths = [
    "assets/images/places/" . $imageName,
    "assets/images/" . $place['image'],
    $bgImage,
];

foreach ($paths as $path) {
    $exists = file_exists($projectRoot . '/' . $path) ? "YES" : "NO";
    echo "$exists " . htmlspecialchars($path) . "<br>";
}

$conn->close();
?>
