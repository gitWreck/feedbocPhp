<?php
date_default_timezone_set('Asia/Manila');

$date = date('Y-m-d H:i:s', time());

include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
 

$category_name = $_POST['category_name'];

$sql = "INSERT INTO category (category_name, date_posted) VALUES ('".$category_name."' , '".$date."')";

$conn->query($sql);

$conn->close();
?>