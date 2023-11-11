<?php
date_default_timezone_set('Asia/Manila');

$date = date('Y-m-d H:i:s', time());

include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
 

$user_type = $_POST['user_type'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$status = 'Active';


$sql = "INSERT INTO user (user_type, position, last_name, first_name, email, password, status, date_posted) 
        VALUES ('".$user_type."','".$user_type."','".$last_name."','".$first_name."','".$email."', '".$password."' , '".$status."' , '".$date."')";

$conn->query($sql);

$conn->close();
?>