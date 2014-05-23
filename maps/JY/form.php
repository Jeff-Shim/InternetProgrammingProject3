<?php

	mysql_connect ("eyecast.tk","a7229328_eyecast","qlalf1234") or die (mysql_error());
	mysql_select_db ("a7229328_eyecast") or die (mysql_error());
	
	
	if($_POST['submit'])
	{
		// photo variables
		$name = $_FILES['upload']['name'];
		$temp = $_FILES['upload']['tmp_name'];
		$type = $_FILES['upload']['type'];
		$size = $_FILES['upload']['size'];
		
		if(!isset($file))
		echo "사진을 선택해 주세요! ";
		
		if ($size > 10000)
		echo "사진이 너무 큽니다! ";
		
		
		
		// add other elements such as title and contents
		$title = $_POST['title'];
		$content = $_POST['content'];
	    // add location, date, author's name and id
		$loc = $_POST['location'];
		$date = $_POST['date'];
		$userName = $_POST['userName'];
		$userId = $_POST['userId']; // used for uploading user's profile image
		
	}	
	else
	{
		header("Location:index.html");
	}
?>