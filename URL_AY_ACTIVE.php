<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);

$response = array();

$ay_active = 'active';

$sql = "
    SELECT * 
    FROM ay_list
    WHERE ay_status = '".$ay_active."'";


$res = $conn->query($sql) or die("Last error: {$conn->error}\n");
$chkRes = $res->fetch_all(MYSQLI_ASSOC);
echo json_encode($chkRes);