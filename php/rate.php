<?php
$db = mysqli_connect("mysql7.000webhost.com", "a7229328_eyecast", "qlalf1234", "a7229328_eyecast");
mysqli_query($db, "set names utf8");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$userId = $_POST['userId'];
$id = $_POST['contentId'];
$ratingQuery = "INSERT INTO  `a7229328_eyecast`.`rating` (`id` , `userId`) VALUES ('$id',  '$userId')";


if (isset($_POST['contentId']) && !empty($_POST['contentId'])) {

    $rating = $_POST['contentRating'];

    $q = "UPDATE `database` SET `ratingTotal`=`ratingTotal`+$rating, `ratingNum`=`ratingNum`+1 WHERE id=$id";

    // rating query
    mysqli_query($db, $ratingQuery) or die(mysqli_error($db));
    // insert data to db and checks if all elements exist
    mysqli_query($db, $q) or die(mysqli_error($db));

    $lastid = mysqli_insert_id($db);
    
    echo "Thank you for voting!\nYou gave it ". round($rating / 2, 1) . " stars.";

}
?>