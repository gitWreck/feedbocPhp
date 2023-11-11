<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);

$response = array();

$email = $_POST['email'];
// $email = 'arnoldcelis85@gmail.com';

$sql = "SELECT mute_counter, resume_Date 
    FROM user 
    WHERE email='".$email."'";

$res = $conn->query($sql);
$chkRes = $res->fetch_array(MYSQLI_ASSOC);

if ($chkRes['mute_counter'] > 0) {
    if (date('Y-m-d') < $chkRes['resume_Date']) {
        $response['BlockedMessage'] = 'You are not allowed to send feedback until ' . $chkRes['resume_Date'];
    } else {
        $response['SuccessMessage'] = "Generate Feedback";
    }
} 

echo json_encode($response);

?>