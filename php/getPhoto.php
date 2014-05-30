<?php
    // this php retrieves the desired image from database named 'store'
    $con = mysqli_connect("mysql7.000webhost.com", "a7229328_eyecast", "qlalf1234", "a7229328_eyecast");
    mysqli_query($con, "set names utf8");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $id = stripslashes($_REQUEST['id']);
    //use stripslahses in order to prevent sql injection crash
    
    $image = mysqli_query($con, "SELECT * FROM `database` WHERE id=$id");
    if (!$image) {
        mysqli_error($con);
    }
    $image = mysqli_fetch_assoc($image);
    $image = $image['image'];
    // get image from the associated array of db
    
    //header("Content-type: image/jpeg");
    // makes this whole php into an image file
    
    echo $image;
    // if you would like to retrieve the image that you want inside the other documents,
    // <img src = getPhoto.php?id= (whatever number) > <-echo this statement
?>