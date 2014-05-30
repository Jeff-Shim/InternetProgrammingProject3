<?php
		
		$db = mysqli_connect("mysql7.000webhost.com", "a7229328_eyecast", "qlalf1234", "a7229328_eyecast");
		
	
		$title = "select*from `database` where `title`";
		$content = "select*from `database` where `content`";
		$locLat = "select*from `database` where `locationLat`";
		$locLng= "select*from `database` where `locationLng`";
		$date = "select*from `database` where `date`";
		$userId = "select*from `database` where `userId`";
		$userName = "select*from `database` where `userName`";
		
		
		trim($title);
		trim($content);
		trim($locLat);
		trim($locLng);
		trim($date);
		trim($userId);
		trim($userName);
		
		print "<p><b> The query is: </b> " . $title . "</p>";
		print "<p><b> The query is: </b> " . $content . "</p>";
		print "<p><b> The query is: </b> " . $locLat . "</p>";
		print "<p><b> The query is: </b> " . $locLng . "</p>";
		print "<p><b> The query is: </b> " . $date . "</p>";
		print "<p><b> The query is: </b> " . $userId . "</p>";
		print "<p><b> The query is: </b> " . $userName . "</p>";
		
				
		$rtitle = mysqli_query($db, $title);
		$rcontent = mysqli_query($db, $content);
		$rlocLat = mysqli_query($db, $locLat);
		$rlocLng = mysqli_query($db, $locLng);
		$rdate = mysqli_query($db, $date);
		$ruserId = mysqli_query($db, $userId);
		$ruserName = mysqli_query($db, $userName);
		
		$nr_title = mysqli_num_rows($rtitle);
		$dtitle = mysqli_fetch_array($rtitle);
		$nf_title = sizeof($dtitle);
		
		$nr_content = mysqli_num_rows($rcontent);
		$dcontent = mysqli_fetch_array($rcontent);
		$nf_content = sizeof($dcontent);
		
		$nr_locLat = mysqli_num_rows($rlocLat);
		$dlocLat = mysqli_fetch_array($rlocLat);
		$nf_locLat = sizeof($dlocLat);
		
		$nr_locLng = mysqli_num_rows($rlocLng);
		$dlocLng = mysqli_fetch_array($rlocLng);
		$nf_locLng = sizeof($dlocLng);
		
		$nr_date = mysqli_num_rows($rdate);
		$ddate = mysqli_fetch_array($rdate);
		$nf_date = sizeof($ddate);
		
		$nr_userId = mysqli_num_rows($ruserId);
		$duserId = mysqli_fetch_array($ruserId);
		$nf_userId = sizeof($duserId);
		
		$nr_userName = mysqli_num_rows($ruserName);
		$duserName = mysqli_fetch_array($ruserName);
		$nf_userName = sizeof($duserName);

		$id = 5;
		
		print "<p><b>타이틀" . $id . ":</b>" . $dtitle[$id] . "</p>";
		print "<p><b>컨텐츠" . $id . ":</b>" . $dcontent[$id] . "</p>";
		print "<p><b>위도 " . $id . ":</b>" . $dlocLat[$id] . "</p>";
		print "<p><b>경도 " . $id . ":</b>" . $dlocLng[$id] . "</p>";
		print "<p><b>날짜 " . $id . ":</b>" . $ddate[$id] . "</p>";
		print "<p><b>ID" . $id . ":</b>" . $duserId[$id] . "</p>";
		print "<p><b>이름 " . $id . ":</b>" . $duserName0[$id] . "</p>";
	
		

		?>