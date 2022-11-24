<?php
$host = "mysql_db";
$username = "root";
$password = "root";
$database_name = "electric";
$conn = new mysqli($host, $username, $password, $database_name);
if (!$conn) {
    echo "Connected to MYSQL error";
    die(mysqli_error($conn));
}

?>
