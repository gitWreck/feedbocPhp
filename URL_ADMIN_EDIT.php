<?php
date_default_timezone_set('Asia/Manila');

$date = date('m-d-Y', time());

include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
$admin_id = $_POST['admin_id'];

$full_name = $_POST['full_name'];
$department = $_POST['department'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$password = $_POST['password'];

$sqlDepartment = "SELECT * FROM department WHERE department_name = '".$department."'";
$resultDepartment = $conn->query($sqlDepartment);
$rowDepartment = $resultDepartment -> fetch_array(MYSQLI_ASSOC);

$sql = "UPDATE admin SET 
full_name='".$full_name."', 
department_id='".$rowDepartment['department_id']."', 
phone_number='".$phone_number."', 
email='".$email."', 
password='".$password."'

WHERE admin_id='".$admin_id."'";

$conn->query($sql);

$conn->close();
?>