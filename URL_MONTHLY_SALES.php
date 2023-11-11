<?php

include 'config.php';
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
$response = array();

$category =  $_POST['category'];

$sale_january = 0;
$sale_february = 0;
$sale_march = 0;
$sale_april = 0;
$sale_may = 0;
$sale_june = 0;
$sale_july = 0; 
$sale_august = 0;
$sale_september = 0;
$sale_october = 0;
$sale_november = 0;
$sale_december = 0;
//January
{
	$sql = "SELECT * FROM feedback WHERE date_month = 'January' AND category_name = '".$category."' ";
	$result = $conn->query($sql);

	while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
	{
		$sale_january += 1;
	}
}

//February
{
	$sql = "SELECT * FROM feedback WHERE date_month = 'February' AND category_name = '".$category."' ";
	$result = $conn->query($sql);

	while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
	{
		$sale_february += 1;
	}
}

//March
{
	$sql = "SELECT * FROM feedback WHERE date_month = 'March' AND category_name = '".$category."' ";
	$result = $conn->query($sql);

	while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
	{
		$sale_march += 1;
	}
}

//April
{
	$sql = "SELECT * FROM feedback WHERE date_month = 'April' AND category_name = '".$category."' ";
	$result = $conn->query($sql);

	while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
	{
		$sale_april += 1;
	}
}

//May
{
	$sql = "SELECT * FROM feedback WHERE date_month = 'May' AND category_name = '".$category."' ";
	$result = $conn->query($sql);

	while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
	{
		$sale_may += 1;
	}
}

//June
{
	$sql = "SELECT * FROM feedback WHERE date_month = 'June' AND category_name = '".$category."' ";
	$result = $conn->query($sql);

	while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
	{
		$sale_june += 1;
	}
}

//July
{
	$sql = "SELECT * FROM feedback WHERE date_month = 'July' AND category_name = '".$category."' ";
	$result = $conn->query($sql);

	while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
	{
		$sale_july += 1;
	}
}

//August
{
	$sql = "SELECT * FROM feedback WHERE date_month = 'August' AND category_name = '".$category."' ";
	$result = $conn->query($sql);

	while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
	{
		$sale_august += 1;
	}
}

//September
{
	$sql = "SELECT * FROM feedback WHERE date_month = 'September' AND category_name = '".$category."' ";
	$result = $conn->query($sql);

	while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
	{
		$sale_september += 1;
	}
}

//October
{
	$sql = "SELECT * FROM feedback WHERE date_month = 'October' AND category_name = '".$category."' ";
	$result = $conn->query($sql);

	while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
	{
		$sale_october += 1;
	}
}

//November
{
	$sql = "SELECT * FROM feedback WHERE date_month = 'November' AND category_name = '".$category."' ";
	$result = $conn->query($sql);

	while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
	{
		$sale_november += 1;
	}
}

//December
{
	$sql = "SELECT * FROM feedback WHERE date_month = 'December' AND category_name = '".$category."' ";
	$result = $conn->query($sql);

	while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
	{
		$sale_december += 1;
	}
}

	$response['data'][] = array(
	'January' => $sale_january,
	'February' => $sale_february,
	'March' => $sale_march,
	'April' => $sale_april,
	'May' => $sale_may,
	'June' => $sale_june,
	'July' => $sale_july,
	'August' => $sale_august,
	'September' => $sale_september,
	'October' => $sale_october,
	'November' => $sale_november,
	'December' => $sale_december
	);

echo json_encode($response);
?>