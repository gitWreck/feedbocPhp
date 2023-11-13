<?php
date_default_timezone_set('Asia/Manila');

$date = date('Y-m-d H:i:s', time());

include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);

$ay_id = $_POST['ay_id'];
$ay_range = $_POST['ay_range'];
$ay_status = $_POST['ay_status'];


$sql = "UPDATE ay_list SET 
ay_range='".$ay_range."',
ay_status='".$ay_status."'
WHERE ay_id='".$ay_id."'
";

$conn->query($sql);

$conn->close();
?>