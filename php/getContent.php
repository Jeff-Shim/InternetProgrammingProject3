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
<div class='scrollFix';'>"."
	<h2 style='margin:0 0 4px 0;'>".$row[1]."</h2><div style='height: 50px;'><img style='float: left' src='http://graph.facebook.com/".$row[6].
    "/picture'><h5 style='margin: 0; padding: 10px 0 0 55px; color: #6E7D85'> Posted : ".$row[5].
	"</h5>"."<h5 style='margin: 0; padding: 0 0 0 55px; color: #6E7D85'> 작성자 : ".$row[7].
	"</h5></div></div><hr/><img style='width: 230px' src='php/getPhoto.php?id=".$row[0].
	"'><p>".$row[2].
	"</p>&&&".$row[3].
	"&&&".$row[4];
$y=$y+1;
//$row = mysqli_fetch_array($result);
}
echo $encodedString;
?>