<?php

include ('resizeImage.php');

$con = mysqli_connect("mysql7.000webhost.com", "a7229328_eyecast", "qlalf1234", "a7229328_eyecast");
mysqli_query($con, "set names utf8");
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($_POST['submit']) {

	//if(!isset($file))
	//{
	//echo "사진을 선택해 주세요! ";
	//	}
	//else
	//{
	// photo variables
	$image_name = addslashes($_FILES['upload']['name']);
	// put add slashes for the protection from mysql crash
	$imageGot = new SimpleImage();
	$imageGot -> load($_FILES['upload']['tmp_name']);
	$imageGot -> resizeToLonger(1024);
	// resize image so that longer part becomes 1024px
	ob_start();
	$imageGot -> output();
	$image = ob_get_clean();
	$image = addslashes($image);
	// get an image as string (which is blob)
	$type = $_FILES['upload']['type'];

	// add other elements such as title and contents
	$title = $_POST['title'];
	$content = $_POST['content'];
	// add location, date, author's name and id
	$locationLat = $_POST['locationLat'];
	$locationLng = $_POST['locationLng'];
	date_default_timezone_set("Asia/Seoul");
	$date = date(c);
	$userName = $_POST['userName'];
	$userId = $_POST['userId'];
	// used for uploading user's profile image

	//$image_size = getimagesize($_FILES['upload']['size']);

	//if ($image_size > 100000)
	//echo "사진이 너무 큽니다! ";

	//if($image_size == FALSE)
	//{
	//echo "사진파일 이어야 합니다.";
	//}
	//else
	//{
	$q = "INSERT INTO `a7229328_eyecast`.`database` (`id`, `imagename`, `image`, `title`, `content`, `locationLat`, `locationLng`, `date`, `userId`, `userName`) VALUES (NULL, '$image_name', '$image', '$title', '$content', '$locationLat', '$locationLng', '$date', '$userId', '$userName');";

	// insert data to db and checks if all elements exist
	mysqli_query($con, $q) or die(mysqli_error($con));

	$lastid = mysqli_insert_id($con);


	//}

	//}
	
	$id = "SELECT LAST(`id`) FROM `database`";
	$sql = "CREATE DATABASE `".$id."` (userId INT, Participation Boolean)";
	if (mysqli_query($con, $sql)) {
		echo "Database my_db created successfully";
	} else {
		echo "Error creating database: " . mysqli_error($con);
	}
	
	header("Location:../index.html");
} else {
	header("Location:../index.html");
}
?>