<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();

$category_name = $_POST['category_name'];

$sql = "SELECT * FROM category WHERE category_name = '".$category_name."'";
$result = $conn->query($sql);
$row = $result -> fetch_array(MYSQLI_ASSOC);


$sql2 = "SELECT * FROM sub_category WHERE category_id = '".$row['category_id']."'";
$result2 = $conn->query($sql2);

while($row2 = $result2 -> fetch_array(MYSQLI_ASSOC)) 
{
    $response['data'][] = $row2;
}

echo json_encode($response);
?>