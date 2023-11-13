<?php
date_default_timezone_set('Asia/Manila');

$date = date('Y-m-d H:i:s', time());

include 'config.php';
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
 

$email = $_POST['email'];
$category_name = $_POST['category_name'];
$sub_category_name = $_POST['sub_category_name'];
$sentiment = $_POST['sentiment'];
$description = $_POST['description'];
$details = $_POST['details'];
$sub_details = $_POST['sub_details'];
$what_happened = $_POST['what_happened'];
$status = 'Pending';
$ay_range = $_POST['ay_range'];

$date_month = date('F', time());
$date_year = date('Y', time());
$date_only = date('Y-m-d', time());

$sql = "INSERT INTO feedback (email, category_name, sub_category_name, 
        sentiment, details, sub_details, what_happened, description, status, 
        date_posted, date_month, date_year, date_only, ay_range) 
    VALUES ('".$email."' , '".$category_name."', '".$sub_category_name."', 
        '".$sentiment."' , '".$details."' ,'".$sub_details."' ,
        '".$what_happened."' ,'".$description."' , '".$status."', 
        '".$date."' , '".$date_month."' , '".$date_year."', '".$date_only."', 
        '".$ay_range."')";

$conn->query($sql);

$conn->close();
?>