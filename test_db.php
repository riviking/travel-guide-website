<?php
include 'db.php'; 

echo "<h2>🌐 Live Database Connection Status</h2>";


if ($conn->connect_error) {
    die("<p style='color:red;'>❌ Connection Failed: " . $conn->connect_error . "</p>");
} else {
    echo "<p style='color:green;'>✔️ Successfully Connected to Railway Live Server!</p>";
}

echo "<h3>📊 Tables in 'travel_guide' Database:</h3>";


$result = $conn->query("SHOW TABLES FROM travel_guide");

if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_array()) {
        
        $tableName = $row[0];
        echo "<li><strong>" . $tableName . "</strong>";
        
    
        $countResult = $conn->query("SELECT COUNT(*) FROM travel_guide.$tableName");
        $countRow = $countResult->fetch_array();
        echo " (Total Rows: " . $countRow[0] . ")";
        
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No tables found in this database.</p>";
}

$conn->close();
?>