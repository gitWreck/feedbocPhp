<?php
date_default_timezone_set('Asia/Manila');

$date = date('m-d-Y', time());

include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
 

$email = $_POST['email'];
$picture = $_POST['picture'];

$sql = "UPDATE user SET picture='".$picture."' WHERE email='".$email."'";

$conn->query($sql);

$conn->close();
?>