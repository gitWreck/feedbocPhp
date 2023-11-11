<?php
date_default_timezone_set('Asia/Manila');

$date = date('m-d-Y', time());

include 'config.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
 
$sub_category_id = $_POST['sub_category_id'];

$sql = "DELETE FROM sub_category WHERE sub_category_id = '".$sub_category_id."'";

$conn->query($sql);

$conn->close();
?>