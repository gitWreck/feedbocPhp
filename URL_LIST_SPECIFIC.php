<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);

// $email = 'arnoldcelis85@gmail.com';
$sc_name = $_POST['sc_name'];
$cat_name = $_POST['cat_name'];

// $sc_name = "Classroom";
// $cat_name = "Facilities";

$sql = "
    SELECT * 
    FROM list_specific
    WHERE sc_name='".$sc_name."' 
    AND cat_name='".$cat_name."'";

$res = $conn->query($sql) or die("Last error: {$conn->error}\n");
$chkRes = $res->fetch_all(MYSQLI_ASSOC);

echo json_encode($chkRes);