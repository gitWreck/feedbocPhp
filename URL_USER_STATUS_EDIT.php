<?php
date_default_timezone_set('Asia/Manila');

$date = date('m-d-Y', time());

include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
 

$user_id = $_POST['user_id'];
$status = $_POST['status'];

$sql = "UPDATE user SET status='".$status."' WHERE user_id='".$user_id."'";

$conn->query($sql);

$conn->close();
?>