<?php
include '../includes/db.php';

echo "<h2>Live Database Connection Status</h2>";

if ($conn->connect_error) {
    die("<p style='color:red;'>Connection Failed: " . $conn->connect_error . "</p>");
}

echo "<p style='color:green;'>Successfully connected to the database.</p>";
echo "<h3>Tables in travel_guide database:</h3>";

$result = $conn->query("SHOW TABLES FROM travel_guide");

if ($result && $result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_array()) {
        $tableName = $row[0];
        echo "<li><strong>" . htmlspecialchars($tableName) . "</strong>";

        $countResult = $conn->query("SELECT COUNT(*) FROM travel_guide.`$tableName`");
        $countRow = $countResult ? $countResult->fetch_array() : [0];
        echo " (Total Rows: " . (int) $countRow[0] . ")";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No tables found in this database.</p>";
}

$conn->close();
?>
