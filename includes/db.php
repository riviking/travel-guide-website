<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "travel_guide"; // change if needed

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}

?>