<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();

$sql = "SELECT * FROM user_type";
$result = $conn->query($sql);
// $usertype = $_POST['user_type'];
//  = "All";


while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
{
    $response['data'][] = $row;
}

echo json_encode($response);
?>