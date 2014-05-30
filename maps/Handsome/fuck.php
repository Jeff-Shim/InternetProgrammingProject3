<?php
		
		$db = mysql_connect("localhost", "a7229328_eyecast", "qlalf1234");
		
		
		$er = mysql_select_db("a7229328_eyecast", "db");
		
		$title = "select*from database where title";
		$content = "select*from database where content";
		$locLat = "select*from database where locationLat";
		$locLng= "select*from database where locationLng";
		$date = "select*from database where date";
		$userId = "select*from database where userId";
		$userName = "select*from database where userName";
		
		$rtitle = mysql_query($title, $db);
		$rcontent = mysql_query($content, $db);
		$rlocLat = mysql_query($locLat, $db);
		$rlocLng = mysql_query($locLng, $db);
		$rdate = mysql_query($date, $db);
		$ruserId = mysql_query($userId, $db);
		$ruserName = mysql_query($userName, $db);
		
		$dtitle = mysql_fetch_array($rtitle);
		$dcontent = mysql_fetch_array($rcontent);
		$dlocLat = mysql_fetch_array($rlocLat);
		$dlocLng = mysql_fetch_array($rlocLng);
		$ddate = mysql_fetch_array($rdate);
		$duserId = mysql_fetch_array($ruserId);
		$duserName = mysql_fetch_array($ruserName);
		
		print "<p><b>타이틀 1 :</b>" . $dtitle[0] . "</p>";
		print "<p><b>컨텐츠1 :</b>" . $dcontent[0] . "</p>";
		print "<p><b>위도 1 :</b>" . $dlocLat[0] . "</p>";
		print "<p><b>경도 1 :</b>" . $dlocLng[0] . "</p>";
		print "<p><b>날짜 1 :</b>" . $ddate[0] . "</p>";
		print "<p><b>ID 1 :</b>" . $duserId[0] . "</p>";
		print "<p><b>이름 1 :</b>" . $duserName[0] . "</p>";
		

		?>