<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();

$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);
// $result->execute();
            
// $plobjs = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($plobjs);

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
    'first_name' => empty($rowUser["first_name"]) ? "Na" : $rowUser["first_name"],
    'last_name' =>  empty($rowUser["last_name"]) ? "Na" : $rowUser["last_name"],
    );
}

echo json_encode($response);
?>