<?php
date_default_timezone_set('Asia/Manila');

$date = date('m-d-Y', time());

include 'config.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
 
$spc_d_name = $_POST['spc_d_name'];
$spc_d_cat = $_POST['spc_d_cat'];
$sc_name = $_POST['sc_name'];
$cat_name = $_POST['cat_name'];

$sql = "DELETE FROM list_specific 
    WHERE 
        spc_d_cat = '".$spc_d_cat."' AND 
        spc_d_name = '".$spc_d_name."' AND
        sc_name = '".$sc_name."' AND 
        cat_name = '".$cat_name."'";

$conn->query($sql);

$conn->close();
?>