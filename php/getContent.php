<?php
$db = mysqli_connect("mysql7.000webhost.com", "a7229328_eyecast", "qlalf1234", "a7229328_eyecast");
mysqli_query($db, 'set names utf8');
$encodedString = "";
$y = 0;
$sql = 'SELECT `id`, `title`, `content`, `locationLat`, `locationLng`, `date`, `userId`, `userName`, `ratingTotal`, `ratingNum`, `imagename` FROM `database` ORDER BY `id` ASC';
//trim($sql);
$result = mysqli_query($db, $sql);
$num_rows = mysqli_num_rows($result);
//$row = mysqli_fetch_array($result);

//for($row_num = 1; $row_num < 1 + $num_rows; $row_num++)   {
//reset($row);
while ($row = mysqli_fetch_array($result)) {
    if($row[1] != '' && $row[2] != '') { // ignore empty contents
        if ($row[9] != 0) {
            $rating = round(($row[8] / $row[9]) / 2, 2);
        } else {
            $rating = 0;
        }
        $ratingLength = 2 * 8 * $rating;
        $star_rating = "<div style='margin: 0; padding: 0 0 0 5px; height: 16px; width: 90px;' class='star-rating'><input class='rb0' id='Ans_1' name='numericRating' type='radio' onclick='rate(". $row[0] . ",0)' value='0' />   <input class='rb1' id='Ans_2' name='numericRating' type='radio' onclick='rate(". $row[0] . ",1)' value='1' /><input class='rb2' id='Ans_3' name='numericRating' type='radio' onclick='rate(". $row[0] . ",2)' value='2' /><input class='rb3' id='Ans_4' name='numericRating' type='radio' onclick='rate(". $row[0] . ",3)' value='3' /><input class='rb4' id='Ans_5' name='numericRating' type='radio' onclick='rate(". $row[0] . ",4)' value='4' /><input class='rb5' id='Ans_6' name='numericRating' type='radio' onclick='rate(". $row[0] . ",5)' value='5' /><input class='rb6' id='Ans_7' name='numericRating' type='radio' onclick='rate(". $row[0] . ",6)' value='6' /><input class='rb7' id='Ans_8' name='numericRating' type='radio' onclick='rate(". $row[0] . ",7)' value='7' /><input class='rb8' id='Ans_9' name='numericRating' type='radio' onclick='rate(". $row[0] . ",8)' value='8' /><input class='rb9' id='Ans_10' name='numericRating' type='radio' onclick='rate(". $row[0] . ",9)' value='9' /><input class='rb10' id='Ans_11' name='numericRating' type='radio' onclick='rate(". $row[0] . ",10)' value='10' /><label for='Ans_1' class='star rb0l' onclick=''></label><label for='Ans_2' class='star rb1l' onclick=''></label><label for='Ans_3' class='star rb2l' onclick=''></label><label for='Ans_4' class='star rb3l' onclick=''></label><label for='Ans_5' class='star rb4l' onclick=''></label><label for='Ans_6' class='star rb5l' onclick=''></label><label for='Ans_7' class='star rb6l' onclick=''></label><label for='Ans_8' class='star rb7l' onclick=''></label><label for='Ans_9' class='star rb8l' onclick=''></label><label for='Ans_10' class='star rb9l' onclick=''></label><label for='Ans_11' class='star rb10l last' onclick=''></label><label for='Ans_1' class='rb' onclick=''>0</label><label for='Ans_2' class='rb' onclick=''>1</label><label for='Ans_3' class='rb' onclick=''>2</label><label for='Ans_4' class='rb' onclick=''>3</label><label for='Ans_5' class='rb' onclick=''>4</label><label for='Ans_6' class='rb' onclick=''>5</label><label for='Ans_7' class='rb' onclick=''>6</label><label for='Ans_8' class='rb' onclick=''>7</label><label for='Ans_9' class='rb' onclick=''>8</label><label for='Ans_10' class='rb' onclick=''>9</label><label for='Ans_11' class='rb' onclick=''>10</label><div class='rating'></div><div class='rating-bg'></div><div style='width: " . $ratingLength . "px;' class='rating-default'></div><div class='rating-default-bg'></div> </div> <!-- star-rating -->";
        $imagename = $row[10];
        if ($imagename == '') {
            $img = '';
        } else {
            $img = "<img style='max-width: 230px; max-height: 173px; display: block; margin:0 auto;' src='php/getPhoto.php?id=" . $row[0] . "'>";
        }
        if ($y == 0) {
            $separator = "";
        } else {
            $separator = "****";
        }
        $encodedString = $encodedString . $separator . "
    <div class='scrollFix';'><h2 style='margin:0 0 4px 0;'>" . $row[1] . "</h2><div style='display: block;'><img style='float: left' src='http://graph.facebook.com/" . $row[6] . "/picture'><h5 style='margin: 0; padding: 0px 0 0 55px; color: #6E7D85'> Posted : " . $row[5] . "</h5>" . "<h5 style='margin: 0; padding: 0 0 0 55px; color: #6E7D85'> 작성자 : " . $row[7] . "</h5>" . $star_rating . "<h5 id='ratingResult' style='display: inline; margin: 0 0 0 -9px; color: #9e0b0f'>" . $rating . " (" . $row[9] . ")" . "</h5><h5 id='ratingSubmit' style='display: none; margin: 0 0 0 -9px; color: #9e0b0f'>submit</h5></div></div><hr/>" . $img . "<p>" . $row[2] . "</p>&&&" . $row[3] . "&&&" . $row[4] . "&&&" . $rating. "&&&" . $row[0] . "&&&" . $row[6];
        $y = $y + 1;
        //$row = mysqli_fetch_array($result);
    }
}
echo $encodedString;
?>