<?php

include("config.php");
$gameid = $_POST['gameid'];
$sqlnew = mysqli_query($conn, "SELECT * FROM `gamebet` WHERE gameid = '$gameid'");
$count = mysqli_num_rows($sqlnew);
if ($count > 0) {
    $rows['success'] = 0;
    $rows['response'] = "Game id already exist.";
} else {
    $rows['success'] = 1;
    $rows['response'] = "Game id not found.";
}
echo (json_encode($rows));
?>