<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$monthList = array(
    'January', 'February', 'March',
    'April','May','June',
    'July','August','September',
    'October','November', 'December');

$ay_range = $_POST['ay_range'];
$category = $_POST['category'];
// $category = 'Facilities';
// $ay_range = '2023-2024';

$response = array();

if($category == "All") { 
    $sql = "
        SELECT * 
        FROM feedback
        WHERE ay_range = '".$ay_range."'
        ";

    $res = $conn->query($sql) or die("Last error: {$conn->error}\n");
    $chkRes = $res->fetch_all(MYSQLI_ASSOC);

    foreach ($monthList as $month) {
        // echo $month . "</br>";
        $MonthDes = new stdClass();
        $MonthDes->Month = $month;

        $fbCount = 0;
        foreach ($chkRes as $ayRange) {
            if($ayRange['date_month'] == $month) {
                // echo "cs" . "</br>";
                $fbCount++;
            }
        }

        $MonthDes->fbCount = $fbCount;

        array_push($response, $MonthDes);
    }
} else {
    $sql = "
        SELECT * 
        FROM feedback
        WHERE category_name = '".$category."' AND
        ay_range = '".$ay_range."'
        ";

    $res = $conn->query($sql) or die("Last error: {$conn->error}\n");
    $chkRes = $res->fetch_all(MYSQLI_ASSOC);

    foreach ($monthList as $month) {
        // echo $month . "</br>";
        $MonthDes = new stdClass();
        $MonthDes->Month = $month;

        $fbCount = 0;
        foreach ($chkRes as $ayRange) {
            if($ayRange['date_month'] == $month) {
                // echo "cs" . "</br>";
                $fbCount++;
            }
        }

        $MonthDes->fbCount = $fbCount;

        array_push($response, $MonthDes);
    }
}


echo json_encode($response);

?>