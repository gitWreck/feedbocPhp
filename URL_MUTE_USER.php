<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);

// $email = 'arnoldcelis85@gmail.com';
$email = $_POST['email'];
$muteCount = 1;

$sql = "SELECT mute_counter, resume_Date 
    FROM user 
    WHERE email='".$email."'";

$res = $conn->query($sql);
$chkRes = $res->fetch_array(MYSQLI_ASSOC);

if ($chkRes['mute_counter'] == 0) {
    $resDate = date('Y-m-d', strtotime('+3 days'));
    $sql = "UPDATE user SET 
    mute_counter = mute_counter + '".$muteCount."',
    resume_Date = '".$resDate."'
    WHERE email='".$email."'";

    echo $email . ' has been blocked until ' . $resDate;
}else if ($chkRes['mute_counter'] == 1) {
    $retDate = $chkRes['resume_Date'];
    $resDate = date('Y-m-d', strtotime($retDate . '+3 days'));
    $sql = "UPDATE user SET 
    mute_counter = mute_counter + '".$muteCount."',
    resume_Date = '".$resDate."'
    WHERE email='".$email."'";

    echo $email . ' has been blocked until ' . $resDate;
} else if ($chkRes['mute_counter'] == 2) {
    $retDate = $chkRes['resume_Date'];

    $resDate = date('Y-m-d', strtotime($retDate . '+3 days'));
    $sql = "UPDATE user SET 
    mute_counter = mute_counter + '".$muteCount."',
    resume_Date = '".$resDate."'
    WHERE email='".$email."'";

    echo 'User already blocked';
} else {
    echo 'User already blocked';
}

$conn->query($sql);

$conn->close();
// $response = array();
?>