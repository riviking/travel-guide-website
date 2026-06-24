<?php
include '../includes/db.php';

$projectRoot = dirname(__DIR__);

echo "<h2>Debug: Image Paths in Database</h2>";

echo "<h3>Countries Images:</h3>";
$result = $conn->query("SELECT id, name, image FROM countries LIMIT 5");
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: {$row['id']}, Name: " . htmlspecialchars($row['name']) . ", Image: <strong>" . htmlspecialchars($row['image']) . "</strong><br>";
    }
} else {
    echo "No countries found";
}

echo "<h3>Places Images:</h3>";
$result = $conn->query("SELECT id, name, image FROM places LIMIT 5");
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: {$row['id']}, Name: " . htmlspecialchars($row['name']) . ", Image: <strong>" . htmlspecialchars($row['image']) . "</strong><br>";
    }
} else {
    echo "No places found";
}

echo "<h3>File Existence Check:</h3>";
$result = $conn->query("SELECT name, image FROM places LIMIT 1");
if ($result && ($row = $result->fetch_assoc())) {
    $image = $row['image'];
    $paths = [
        "assets/images/" . $image,
        "assets/images/places/" . $image,
    ];

    echo "Testing paths for: <strong>" . htmlspecialchars($image) . "</strong><br>";
    foreach ($paths as $path) {
        $exists = file_exists($projectRoot . '/' . $path) ? "EXISTS" : "NOT FOUND";
        echo htmlspecialchars($path) . " -> $exists<br>";
    }
}

$conn->close();
?>
