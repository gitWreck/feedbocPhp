<?php
date_default_timezone_set('Asia/Manila');

$date = date('m-d-Y', time());

include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);

$spc_d_id = $_POST['spc_d_id'];
$spc_d_name = $_POST['spc_d_name'];
$spc_d_cat = $_POST['spc_d_cat'];

$sql = "UPDATE list_specific
    SET spc_d_cat ='".$spc_d_cat."', 
        spc_d_name ='".$spc_d_name."'
    WHERE spc_d_id='".$spc_d_id."'";

$conn->query($sql);

$conn->close();
?>