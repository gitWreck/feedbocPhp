<?php
date_default_timezone_set('Asia/Manila');

$date = date('m-d-Y', time());

include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
 



$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
// $user_type = $_POST['user_type'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "UPDATE user SET 
first_name='".$first_name."', 
last_name='".$last_name."',
password='".$password."'

WHERE email='".$email."'";
// user_type='".$user_type."', 

$conn->query($sql);

$conn->close();
?>