<?php

$host = "zephyr.proxy.rlwy.net";
$port = "29464";
$user = "root";
$password = "QvmKzUJiCnluNFsixCDbPWfPBmGnaPCy";
$dbname = "travel_guide"; 


$conn = new mysqli($host, $user, $password, $dbname, $port);

if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}

?>