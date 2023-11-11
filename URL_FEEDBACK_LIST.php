<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();

$email = $_POST['email'];
$status = $_POST['status'];
$sentiment = $_POST['sentiment'];

$sql = "SELECT * FROM feedback WHERE email = '".$email."' AND status = '".$status."' AND sentiment = '".$sentiment."'";
$result = $conn->query($sql);

while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
{
    $sqlUser = "SELECT * FROM user WHERE email = '".$row['email']."'";
    $resultUser = $conn->query($sqlUser);
    $rowUser = $resultUser -> fetch_array(MYSQLI_ASSOC);

    $response['data'][] = array('feedback_id' => $row["feedback_id"], 
    'email' => $row["email"], 
    'category_name' => $row["category_name"], 
    'sub_category_name' => $row["sub_category_name"],
    'sentiment' => $row["sentiment"],
    'description' => $row["description"],
    'status' => $row["status"],
    'sub_status' => $row["sub_status"],
    'date_posted' => $row["date_posted"],
    // 'full_name' => $rowUser["full_name"],
    'first_name' => $rowUser["first_name"],
    'last_name' => $rowUser["last_name"],
    );
}

echo json_encode($response);
?>