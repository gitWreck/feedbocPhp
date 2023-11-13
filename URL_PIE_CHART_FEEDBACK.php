<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();

$category = $_POST['category'];
$ay_range = $_POST['ay_range'];

if($category == "All") {
    $sql = "SELECT * 
    FROM feedback 
    WHERE ay_range = '".$ay_range."' ";
    $result = $conn->query($sql);

    $like = 0;
    $dislike = 0;
    
    while($row = $result -> fetch_array(MYSQLI_ASSOC)) {
        if($row['sentiment'] == 'Like') {
            $like++;
        } else {
            $dislike++;
        }
    }
    
    $response['data'][] = array(
        'like' => $like, 
        'dislike' => $dislike
        );
} else {
    $sql = "SELECT * 
    FROM feedback 
    WHERE category_name = '".$category."' AND 
      ay_range = '".$ay_range."' ";

    $result = $conn->query($sql);

    $like = 0;
    $dislike = 0;

    while($row = $result -> fetch_array(MYSQLI_ASSOC)) {
        if($row['sentiment'] == 'Like') {
            $like++;
        } else {
            $dislike++;
        }
    }

    $response['data'][] = array(
        'like' => $like, 
        'dislike' => $dislike
        );
}


echo json_encode($response);
?>