<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();

$category = $_POST['category'];

$sql = "SELECT * FROM feedback WHERE category_name = '".$category."'";
$result = $conn->query($sql);

$like = 0;
$dislike = 0;

while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
{
    if($row['sentiment'] == 'Like')
    {
        $like++;
    }
    else
    {
        $dislike++;
    }
}

    $response['data'][] = array(
    'like' => $like, 
    'dislike' => $dislike
    );

echo json_encode($response);
?>