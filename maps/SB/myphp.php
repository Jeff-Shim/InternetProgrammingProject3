<?php
		
		$db = mysqli_connect("mysql7.000webhost.com", "a7229328_eyecast", "qlalf1234", "a7229328_eyecast");
		
		mysqli_query($db, 'set names utf8');
			
		$sql = 'SELECT `title`, `content`, `locationLat`, `locationLng`, `date`, `userId`, `userName` FROM `database` ORDER BY `id` ASC';
		
		trim($sql);
		
		print "<p><b> The query is: </b> " . $sql . "</p>";
		
		$result = mysqli_query($db, $sql);
	
		$num_rows = mysqli_num_rows($result);
		
		$row = mysqli_fetch_array($result);
		
		$num_fields = sizeof($row);
	
		while ($next_element = each($row)){
			$next_element = each($row);
			$next_key = $next_element['key'];
			print "<p>종류 : " . $next_key . "</p>";
		}
		
		print "<br/>";
		print "<hr>";
		
		for($row_num = 1; $row_num < 1 + $num_rows; $row_num++)	{
			reset($row);
			print "<p>위도 " . $row_num . ": " . $row[2] . "</p>";
			print "<p>경도 " . $row_num . ": " . $row[3] . "</p>";
			print "<hr>";
			$row = mysqli_fetch_array($result);
	
		}
		
		trim($sql);
		
		$result = mysqli_query($db, $sql);
	
		$num_rows = mysqli_num_rows($result);
		
		$row = mysqli_fetch_array($result);
		
		$num_fields = sizeof($row);
		print "<br/>";
		print "<hr>";
		
		for($row_num = 1; $row_num < 1 + $num_rows; $row_num++)	{
			reset($row);
			
			print "<b>" . $row_num . "</b>";
			print "<p>제목 : " . $row[0] . "</p>";
			print "<p>내용 : " . $row[1] . "</p>";
			print "<p>날짜 : " . $row[4] . "</p>";
			print "<p>ID : " . $row[5] . "</p>";
			print "<p>이름 : " . $row[6] . "</p>";
			print "<hr>";
			$row = mysqli_fetch_array($result);
		}
		

?>