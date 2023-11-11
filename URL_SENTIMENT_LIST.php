<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();

$category = $_POST['category'];

$sql = "SELECT * FROM feedback WHERE sentiment = 'Dislike' AND category_name = '".$category."'";
$result = $conn->query($sql);

while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
{
    $response['data'][] = array('description' => $row["description"]
    );
}

echo json_encode($response);
?>