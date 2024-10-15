<?php

include("config.php");
$gameid = $_POST['gameid'];
$userid = $_POST['userid'];
if (empty($gameid)) {
    $rows['success'] = 0;
    $rows['response'] = "Game Id required";
    echo (json_encode($rows));
    die;
}
if (empty($userid)) {
    $rows['success'] = 0;
    $rows['response'] = "User Id required";
    echo (json_encode($rows));
    die;
}
//echo "UPDATE `gamebet` SET minimize_time = '" . time() . "' WHERE gameid = '$gameid' and userid = '$userid'";
$sqlnew = mysqli_query($conn, "UPDATE `gamebet` SET minimize_time = '" . time() . "' WHERE gameid = '$gameid' and userid = '$userid'");
mysqli_query($conn, "INSERT INTO `user_games`(`userid`, `gameid`, `created_date`) VALUES ('$userid','$gameid', '$current_timestamp')");
if ($sqlnew) {
    $rows['success'] = 1;
    $rows['response'] = "Time added successfully.";
} else {
    $rows['success'] = 0;
    $rows['response'] = "Failed, please try again.";
}
echo (json_encode($rows));
?>