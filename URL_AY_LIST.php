<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);

$response = array();

$sql = "
    SELECT * 
    FROM ay_list";


$res = $conn->query($sql) or die("Last error: {$conn->error}\n");
$chkRes = $res->fetch_all(MYSQLI_ASSOC);
// while($row = $res->fetch_array(MYSQLI_ASSOC)) {
//     $response['data'][] = array(
//         'ay_id' => $row["ay_id"], 
//         'ay_range' => $row["ay_range"],
//         'ay_status' => $row["ay_status"])
// };

// echo json_encode($response);
echo json_encode($chkRes);