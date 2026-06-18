<?php
include('includes/db.php');

echo "<h2>Countries in Database vs Files</h2>";

$result = $conn->query("SELECT id, name, image FROM countries ORDER BY id");

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Name</th><th>DB Image Path</th><th>File Exists?</th></tr>";

while($row = $result->fetch_assoc()) {
    $imageName = str_replace('countries/', '', $row['image']);
    $filepath = __DIR__ . '/assets/images/countries/' . $imageName;
    $exists = file_exists($filepath) ? "✓ YES" : "✗ NO";
    
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['image']}</td>";
    echo "<td>$exists</td>";
    echo "</tr>";
}

echo "</table>";

echo "<h3>Files in Folder:</h3>";
$files = scandir(__DIR__ . '/assets/images/countries/');
foreach($files as $f) {
    if ($f != '.' && $f != '..' && !is_dir(__DIR__ . '/assets/images/countries/' . $f)) {
        echo "- $f<br>";
    }
}

$conn->close();
?>
