<?php
$host = "localhost";
$username = "root";
$password = "";
$database_name = "electric";
$conn = new mysqli($host, $username, $password, $database_name);
if (!$conn) {
    echo "Connected to MYSQL error";
    die(mysqli_error($conn));
}
