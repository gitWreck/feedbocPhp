<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();

$sql = "SELECT * FROM admin";
$result = $conn->query($sql);

while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
{
    $sqlDepartment = "SELECT * FROM department WHERE department_id = '".$row['department_id']."'";
    $resultDepartment = $conn->query($sqlDepartment);
    $rowDepartment = $resultDepartment -> fetch_array(MYSQLI_ASSOC);

    $response['data'][] = array('admin_id' => $row["admin_id"], 
    'full_name' => $row["full_name"], 
    'contact_number' => $row["phone_number"], 
    'department' => $rowDepartment["department_name"],
    'email' => $row["email"],
    'password' => $row["password"]
    );
}

echo json_encode($response);
?>