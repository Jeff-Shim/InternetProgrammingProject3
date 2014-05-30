<?php
		
		$db = mysqli_connect("mysql7.000webhost.com", "a7229328_eyecast", "qlalf1234", "a7229328_eyecast");
		
		
		$title = "select*from database where title";
		$content = "select*from database where content";
		$locLat = "select*from database where locationLat";
		$locLng= "select*from database where locationLng";
		$date = "select*from database where date";
		$userId = "select*from database where userId";
		$userName = "select*from database where userName";
		
		$rtitle = mysqli_query($db, $title);
		$rcontent = mysqli_query($db, $content);
		$rlocLat = mysqli_query($db, $locLat);
		$rlocLng = mysqli_query($db, $locLng);
		$rdate = mysqli_query($db, $date);
		$ruserId = mysqli_query($db, $userId);
		$ruserName = mysqli_query($db, $userName);
		
		$dtitle = mysqli_fetch_array($rtitle);
		$dcontent = mysqli_fetch_array($rcontent);
		$dlocLat = mysqli_fetch_array($rlocLat);
		$dlocLng = mysqli_fetch_array($rlocLng);
		$ddate = mysqli_fetch_array($rdate);
		$duserId = mysqli_fetch_array($ruserId);
		$duserName = mysqli_fetch_array($ruserName);
		
		print "<p><b>타이틀 1 :</b>" . $dtitle[0] . "샹</p>";
		print "<p><b>컨텐츠1 :</b>" . $dcontent[0] . "샹</p>";
		print "<p><b>위도 1 :</b>" . $dlocLat[0] . "샹</p>";
		print "<p><b>경도 1 :</b>" . $dlocLng[0] . "샹</p>";
		print "<p><b>날짜 1 :</b>" . $ddate[0] . "샹</p>";
		print "<p><b>ID 1 :</b>" . $duserId[0] . "샹</p>";
		print "<p><b>이름 1 :</b>" . $duserName0[0] . "샹</p>";
		

		?>