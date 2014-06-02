<?php
$db = mysqli_connect("mysql7.000webhost.com", "a7229328_eyecast", "qlalf1234", "a7229328_eyecast");
mysqli_query($db, 'set names utf8');
$articleId = $_POST['contentId'];
$userId = $_POST['user'];
$ratingQuery = "SELECT * FROM  `rating` WHERE `id` = ". $articleId ." AND `userId` =" . $userId;
$didRating = mysqli_query($db, $ratingQuery);

if(mysqli_num_rows($didRating) > 0){
    echo '1'; // echo 1 if he or she rated that article
}
else {
    echo '0';
}
?>