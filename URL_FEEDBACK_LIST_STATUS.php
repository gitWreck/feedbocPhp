<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();

$status = $_POST['status'];
//  = "All";
$sentiment = $_POST['sentiment'];
//  = "Like";
$category = $_POST['category'];
//  = "All";

if($status == 'All' && $category == 'All')
{
    $sql = "SELECT * FROM feedback WHERE sentiment = '".$sentiment."'";
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
        'first_name' => empty($rowUser["first_name"]) ? "Na" : $rowUser["first_name"],
        'last_name' =>  empty($rowUser["last_name"]) ? "Na" : $rowUser["last_name"],
        // 'full_name' => $rowUser["full_name"],
        );
    }
}
else if($status != 'All' && $category == 'All')
{
    $sql = "SELECT * FROM feedback WHERE status = '".$status."' AND sentiment = '".$sentiment."'";
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
        'first_name' => empty($rowUser["first_name"]) ? "Na" : $rowUser["first_name"],
        'last_name' =>  empty($rowUser["last_name"]) ? "Na" : $rowUser["last_name"],
        // 'full_name' => $rowUser["full_name"],
        );
    }
}
// else if($status == 'All' && $category != 'All')
// {
//     $sql = "SELECT * FROM feedback WHERE sentiment = '".$sentiment."' AND category_name = '".$category."'";
//     $result = $conn->query($sql);
    
//     while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
//     {
//         $sqlUser = "SELECT * FROM user WHERE email = '".$row['email']."'";
//         $resultUser = $conn->query($sqlUser);
//         $rowUser = $resultUser -> fetch_array(MYSQLI_ASSOC);
    
//         $response['data'][] = array('feedback_id' => $row["feedback_id"], 
//         'email' => $row["email"], 
//         'category_name' => $row["category_name"], 
//         'sub_category_name' => $row["sub_category_name"],
//         'sentiment' => $row["sentiment"],
//         'description' => $row["description"],
//         'status' => $row["status"],
//         'sub_status' => $row["sub_status"],
//         'date_posted' => $row["date_posted"],
//         'first_name' => $rowUser["first_name"],
//         'last_name' => $rowUser["last_name"],
//         // 'full_name' => $rowUser["full_name"],
//         );
//     }
// }
else
{
    $sql = "SELECT * FROM feedback WHERE status = '".$status."' AND sentiment = '".$sentiment."' AND category_name = '".$category."'";
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
        'first_name' => empty($rowUser["first_name"]) ? "Na" : $rowUser["first_name"],
        'last_name' =>  empty($rowUser["last_name"]) ? "Na" : $rowUser["last_name"],
        // 'full_name' => $rowUser["full_name"],
        );
    }
}


echo json_encode($response);
?>