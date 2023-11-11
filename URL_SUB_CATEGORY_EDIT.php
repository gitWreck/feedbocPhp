<?php
date_default_timezone_set('Asia/Manila');

$date = date('m-d-Y', time());

include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
$sub_category_id = $_POST['sub_category_id'];

$sub_category_name = $_POST['sub_category_name'];

$sql = "UPDATE sub_category SET 
sub_category_name='".$sub_category_name."'

WHERE sub_category_id='".$sub_category_id."'";

$conn->query($sql);

$conn->close();
?>