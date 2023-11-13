<?php
date_default_timezone_set('Asia/Manila');

$date = date('m-d-Y', time());

include 'config.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
 
$ay_id = $_POST['ay_id'];
$ay_range = $_POST['ay_range'];
$ay_status = $_POST['ay_status'];

$sql = "DELETE FROM ay_list
    WHERE 
        ay_id = '".$ay_id."' AND 
        ay_range = '".$ay_range."' AND
        ay_status = '".$ay_status."'";

$conn->query($sql);

$conn->close();
?>