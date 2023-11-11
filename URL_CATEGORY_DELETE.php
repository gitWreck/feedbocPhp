<?php
date_default_timezone_set('Asia/Manila');

$date = date('m-d-Y', time());

include 'config.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
 
$category_id = $_POST['category_id'];

$sql = "DELETE FROM category WHERE category_id = '".$category_id."'";

$conn->query($sql);

$conn->close();
?>