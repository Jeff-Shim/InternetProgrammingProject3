<?php

if (isset($_POST['contentId']) && !empty($_POST['contentId'])) {

    $con = mysqli_connect("mysql7.000webhost.com", "a7229328_eyecast", "qlalf1234", "a7229328_eyecast");
    mysqli_query($con, "set names utf8");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $id = $_POST['contentId'];
    $rating = $_POST['contentRating'];

    $q = "UPDATE `database` SET `ratingTotal`=`ratingTotal`+$rating, `ratingNum`=`ratingNum`+1 WHERE id=$id";

    // insert data to db and checks if all elements exist
    mysqli_query($con, $q) or die(mysqli_error($con));

    $lastid = mysqli_insert_id($con);
    
    echo "Thank you for voting!";

}
?>