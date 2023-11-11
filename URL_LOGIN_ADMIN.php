<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();
$email = $_POST['email'];
$user_password = $_POST['password'];

$response = array();

$sql = "SELECT * FROM admin WHERE email = '".$email."' AND password = '".$user_password."'";
$result = $conn->query($sql);

while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
{
    $response['data'][] = $row;
}

echo json_encode($response);

?>