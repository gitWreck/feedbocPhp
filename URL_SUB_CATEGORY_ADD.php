<?php
date_default_timezone_set('Asia/Manila');

$date = date('Y-m-d H:i:s', time());

include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
$category_id = $_POST['category_id'];
$sub_category_name = $_POST['sub_category_name'];

$sql = "INSERT INTO sub_category (category_id, sub_category_name, date_posted) VALUES ('".$category_id."' ,'".$sub_category_name."' , '".$date."')";

$conn->query($sql);

$conn->close();
?>