<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();

// $sql = "SELECT * FROM user";
// $result = $conn->query($sql);
$usertype = $_POST['user_type'];

if($usertype != 'All') {
    $sql = "SELECT * FROM user WHERE user_type = '".$usertype."'";
    $result = $conn->query($sql);
    while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
    {
        $response['data'][] = array('user_id' => $row["user_id"], 
        // 'full_name' => $row["full_name"],
        'email' => $row["email"],
        'first_name' => $row["first_name"],
        'last_name' =>  $row["last_name"],
        'position' => $row["position"],
        'mute_counter' => $row["mute_counter"]
        );
    }
} else {
    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);
    while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
    {
        $response['data'][] = array('user_id' => $row["user_id"], 
        // 'full_name' => $row["full_name"],
        'email' => $row["email"],
        'first_name' => $row["first_name"],
        'last_name' =>  $row["last_name"],
        'position' => $row["position"],
        'mute_counter' => $row["mute_counter"]
        );
    }
}


echo json_encode($response);
?>