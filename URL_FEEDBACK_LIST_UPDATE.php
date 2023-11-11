<?php
date_default_timezone_set('Asia/Manila');

$date = date('m-d-Y', time());

include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
 

$status = $_POST['status'];
$sub_status = $_POST['sub_status'];
$feedback_id = $_POST['feedback_id'];

$sql = "UPDATE feedback SET status='".$status."', sub_status = '".$sub_status."' WHERE feedback_id='".$feedback_id."'";

$conn->query($sql);

$conn->close();
?>