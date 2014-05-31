<?php
$db=mysqli_connect("mysql7.000webhost.com","a7229328_eyecast","qlalf1234","a7229328_eyecast");
mysqli_query($db,'set names utf8');
$encodedString="";
$y=0;
$sql='SELECT `id`, `title`, `content`, `locationLat`, `locationLng`, `date`, `userId`, `userName` FROM `database` ORDER BY `id` ASC';
//trim($sql);
$result=mysqli_query($db,$sql);
$num_rows=mysqli_num_rows($result);
//$row = mysqli_fetch_array($result);
$num_fields=sizeof($row);
//for($row_num = 1; $row_num < 1 + $num_rows; $row_num++)   {
//reset($row);
while($row=mysqli_fetch_array($result)) {
if($y==0) {
$separator="";
} else {
$separator="****";
}
$encodedString=$encodedString.$separator."
<p class='content'>"."<img src='http://graph.facebook.com/".$row[6]."/picture'><br />"."
	<b>title:</b>".$row[1]."
	<br />"."<img src='php/getPhoto.php?id=".$row[0]."'><br />"."
	<b>content:</b>".$row[2]."
	<br />
	<b>lat: </b>".$row[3]."
	<br />
	<b>long: </b>".$row[4]."
	<br />
	<b>username: </b>".$row[7]."
</p>&&&".$row[3]."&&&".$row[4];
$y=$y+1;
//$row = mysqli_fetch_array($result);
}
echo $encodedString;
?>