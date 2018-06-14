<?php
/*

    ** Code By AeroPwn : http://www.youtube.com/channel/UC0AMc9vyMz4Tko_auIxGmIQ
    
    Original Code by TheMindSpeaks : http://themindspeaks.com

*/

$db = mysqli_connect('127.0.0.1','root','','themindspeaks');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();// Exits script if an error is encounted while establishing mysql connection
}

$datelol = date("Y-m-d");    // Returns YEAR-MONTH-DAY
$query = "SELECT * FROM `stats` WHERE `date` = '$datelol'";//Query for selection for current date


$result = mysqli_query($db, $query);// Execute single result query
$numRow = mysqli_num_rows($result);



if ($numRow == 0){// Inserts a new row if stats for current date doesnt exits
    $insertQuery = "INSERT INTO `stats` (`date`) VALUE ('$datelol')";
    mysqli_query($db, $insertQuery);
}

else {// Updates page view for current date if row exists
    $updateQuery = "UPDATE `stats` SET `page_views` = `page_views`+1 WHERE `date` = '$datelol'";
    mysqli_query($db, $updateQuery);
}

$pageView mysqli_query($db, $query);// Seelcts todays page views
$row = mysqli_fetch_assoc($pageView);// Extracts result
?>

<html>
<center>
<br><br><br>


<h1>Page views</h1>
<?php echo $row['page_views']; ?>


<br><br><br>
</center>
