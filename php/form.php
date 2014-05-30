<?php

	mysql_connect ("eyecast.tk","a7229328_eyecast","qlalf1234") or die (mysql_error());
	mysql_select_db ("a7229328_eyecast") or die (mysql_error());
	
	
	if($_POST['submit'])
	{
		
		if(!isset($file))
		{
			echo "사진을 선택해 주세요! ";
		}	
		else	
		{
		// photo variables
		$image_name = addslashes($_FILES['upload']['name']); // put add slashes for the protection from mysql crash
		$image = addslashes(file_get_contents($_FILES['upload']['tmp_name'])); // get an image
		$type = $_FILES['upload']['type'];
		
			
		// add other elements such as title and contents
		$title = $_POST['title'];
		$content = $_POST['content'];
	    // add location, date, author's name and id
		$locationLat = $_POST['locationLat'];
		$locationLng = $_POST['locationLng'];
		$date = date (c);
		$userName = $_POST['userName'];
		$userId = $_POST['userId']; // used for uploading user's profile image
		
		$image_size = getimagesize($_FILES['upload']['size']);
		
		if ($image_size > 100000)
		echo "사진이 너무 큽니다! ";
		
		
		if($image_size == FALSE)
		{
		echo "사진파일 이어야 합니다.";
		}
		else
		{
			// insert data to db and checks if all elements exist
			if(!$insert = mysql_query("INSERT INTO database VALUES ('','$image_name','$image_size','$title','$content','$locationLat','$locationLng','$date','$us')")) // INSERT 8 + 1 ELEMENTS, FIRST ELEMENT = ID 
			{
				echo "Problem uploading image";
			}
			else
			 {
			
				$lastid = mysql_insert_id(); 
				header("Location:../index.html");	
			}
			
			
		}
		
		
	
		
		}
		
		
		
	}	
	else
	{
		header("Location:../index.html");
	}
?>