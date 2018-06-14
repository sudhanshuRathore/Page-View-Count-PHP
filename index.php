<?php
/*

Coded by AeroPwn, pls no steal kthx
MIT Licensed btw

*/

$db = mysqli_connect('127.0.0.1','root','password','database_name');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$datelol = date("Y-m-d");    // Returns YEAR-MONTH-DAY
$query = "SELECT * FROM `stats` WHERE `date` = '$datelol'";
$query2 = mysqli_query($db, "SELECT * FROM `stats`");

$result = mysqli_query($db, $query);
$result2 = mysqli_num_rows($result);

$row = mysqli_fetch_assoc($query2);

if ($result2 == 0){
    $insertQuery = "INSERT INTO `stats` (`date`) VALUE ('$datelol')";
    mysqli_query($db, $insertQuery);
}

else {
    $updateQuery = "UPDATE `stats` SET `page_views` = `page_views`+1 WHERE `date` = '$datelol'";
    mysqli_query($db, $updateQuery);
}
?>

<html>
<center>
<br><br><br>


<h1>Page views</h1>
<?php echo $row['page_views']; ?>


<br><br><br>
</center>
