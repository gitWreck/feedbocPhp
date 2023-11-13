<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();
$email = $_POST['email'];
$user_password = $_POST['password'];

$email = 'arnoldcelis85@gmail.com';
$user_password = "123456";

$response = array();

$sql = "SELECT mute_counter 
    FROM user 
    WHERE email='".$email."'";
$res = $conn->query($sql);
$chkRes = $res->fetch_array(MYSQLI_ASSOC);
// echo json_encode($res);
if(ISSET($chkRes['mute_counter'])) {
    if ($chkRes['mute_counter'] == 3) {
        // echo "Account " . $email . " blocked";
        $response['BlockedMessage'] = "Account " . $email . " blocked";
    } else {
        $sql = "SELECT * FROM user WHERE email = '".$email."' AND password = '".$user_password."'";
        $result = $conn->query($sql);
        
        while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
        {
            $response['data'][] = $row;
        }
    
    }
    echo json_encode($response);
} else {
    $response['InvalidMessage'] = "Invalid Credentials";
    echo json_encode($response);
}



?>