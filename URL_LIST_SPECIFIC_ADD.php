<?php
date_default_timezone_set('Asia/Manila');

$date = date('Y-m-d H:i:s', time());

include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);

$spc_d_name = $_POST['spc_d_name'];
$spc_d_cat = $_POST['spc_d_cat'];
$sc_name = $_POST['sc_name'];
$cat_name = $_POST['cat_name'];
$sc_id = $_POST['sc_id'];
$cat_id = $_POST['cat_id'];


$sql = "INSERT INTO list_specific (spc_d_cat, spc_d_name, sc_id, sc_name, cat_id, cat_name) 
    VALUES ('".$spc_d_cat."' , '".$spc_d_name."','".$sc_id."' , '".$sc_name."','".$cat_id."' , '".$cat_name."')";

$conn->query($sql);

$conn->close();
?>