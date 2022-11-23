<?php
include 'connectdb.php.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tblhousehold WHERE id=$id";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        // echo "Deleted user successfully!";
        header('location:display.php');
    } else {
        echo "Deleted user failed!";
        die(mysqli_error($conn));
    }
}
