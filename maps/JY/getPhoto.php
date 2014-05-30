<?php
   // this php retrieves the desired image from database named 'store'
	mysql_connect ("eyecast.tk","a7229328_eyecast","qlalf1234") or die (mysql_error());
	mysql_select_db ("a7229328_eyecast") or die (mysql_error());
	
	$id = stripslashes($_REQUEST['id']); //use stripslahses in order to prevent sql injection crash
	
	$image = mysql_query("SELECT * FROM database WHERE id = $id");
	$image = mysql_fetch_assoc($image);
	$image= $image['image']; // get image from the associated array of db
	
	header("Content-type: image/jpeg"); // makes this whole php into an image file
	
	
	// if you would like to retrieve the image that you want inside the other documents,
	// <img src = getPhoto.php?id= (whatever number) > <-echo this statement
?>