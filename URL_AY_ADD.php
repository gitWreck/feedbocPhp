<?php
date_default_timezone_set('Asia/Manila');

$date = date('Y-m-d H:i:s', time());

include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);

$ay_range = $_POST['ay_range'];
$ay_status = $_POST['ay_status'];


$sql = "INSERT INTO ay_list (ay_range, ay_status) 
    VALUES ('".$ay_range."', '".$ay_status."')";

$conn->query($sql);

$conn->close();
?>