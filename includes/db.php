<?php

$host = "mysql://root:QvmKzUJiCnluNFsixCDbPWfPBmGnaPCy@zephyr.proxy.rlwy.net:29464/railway";
$user = "root";
$password = "QvmKzUJiCnluNFsixCDbPWfPBmGnaPCy";
$database = "travel_guide"; // change if needed

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}

?>