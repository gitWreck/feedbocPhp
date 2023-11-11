<?php
include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);

$email = $_POST['emailFP'];
$new_password = $_POST['new_password'];


$sql = "UPDATE user SET password='".$new_password."' WHERE email='".$email."'";

$conn->query($sql);

echo "success";

$conn->close();
?>