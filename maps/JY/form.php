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
		$loc = $_POST['location'];
		$date = $_POST['date'];
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
			if(!$insert = mysql_query("INSERT INTO store VALUES ('','$image_name','$_image_size','','','','','','','','')")) // INSERT 10 + 1 ELEMENTS, FIRST ELEMENT = ID 
			{
				echo "Problem uploading image";
			}
			else
			 {
			
				$lastid = mysql_insert_id(); 	
			}
			
			
		}
		
		
	
		
		}
		
		
		
	}	
	else
	{
		header("Location:index.html");
	}
?>