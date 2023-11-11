<?php
include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();
$email = $_POST['email'];

$stmt = $conn->prepare("SELECT user_id FROM user WHERE email = '".$email."'");
$result = $stmt->execute();

if($result == TRUE)
{
	
	$stmt->store_result();
			 
	$stmt->bind_result($user_id);

	$stmt->fetch();
	$response['user_id'] = $user_id;

} 
else
{
	
	$response['error'] = true;
	$response['message'] = "Incorrect email";
	
}

echo json_encode($response);
?>