<?php
include('includes/db.php');

echo "<h2>Debug: Image Paths in Database</h2>";

// Check countries
echo "<h3>Countries Images:</h3>";
$result = $conn->query("SELECT id, name, image FROM countries LIMIT 5");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: {$row['id']}, Name: {$row['name']}, Image: <strong>{$row['image']}</strong><br>";
    }
} else {
    echo "No countries found";
}

// Check places
echo "<h3>Places Images:</h3>";
$result = $conn->query("SELECT id, name, image FROM places LIMIT 5");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: {$row['id']}, Name: {$row['name']}, Image: <strong>{$row['image']}</strong><br>";
    }
} else {
    echo "No places found";
}

// Check if files exist
echo "<h3>File Existence Check:</h3>";
$result = $conn->query("SELECT name, image FROM places LIMIT 1");
if ($row = $result->fetch_assoc()) {
    $image = $row['image'];
    
    $paths = [
        "assets/images/" . $image,
        "assets/images/places/" . $image,
        __DIR__ . "/assets/images/" . $image,
        __DIR__ . "/assets/images/places/" . $image,
    ];
    
    echo "Testing paths for: <strong>{$image}</strong><br>";
    foreach ($paths as $p) {
        $exists = file_exists($p) ? "✓ EXISTS" : "✗ NOT FOUND";
        echo "$p → $exists<br>";
    }
}

$conn->close();
?>
