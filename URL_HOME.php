<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();

$email = $_POST['email'];

$sql = "SELECT * FROM user WHERE email = '".$email."'";
$result = $conn->query($sql);

while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
{
    $response['data'][] = $row;
}

echo json_encode($response);
?>