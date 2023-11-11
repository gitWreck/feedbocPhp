<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();

$category_id = $_POST['category_id'];

$sql = "SELECT * FROM sub_category WHERE category_id = '".$category_id."'";
$result = $conn->query($sql);

while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
{
    $response['data'][] = $row;
}

echo json_encode($response);
?>