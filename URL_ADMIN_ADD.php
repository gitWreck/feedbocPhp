<?php
date_default_timezone_set('Asia/Manila');

$date = date('Y-m-d H:i:s', time());

include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
 

$full_name = $_POST['full_name'];
$department = $_POST['department'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM department WHERE department_name = '".$department."'";
$result = $conn->query($sql);
$row = $result -> fetch_array(MYSQLI_ASSOC);


$sql = "INSERT INTO admin (full_name, department_id, phone_number, email, password, date_posted) VALUES ('".$full_name."' , '".$row['department_id']."', '".$phone_number."', '".$email."' , '".$password."' , '".$date."')";

$conn->query($sql);

$conn->close();
?>