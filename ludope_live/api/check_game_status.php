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
if ($userid == '') {
    $rows['success'] = 0;
    $rows['response'] = "User Id required";
    echo (json_encode($rows));
    die;
}

$sqlnew = mysqli_query($conn, "SELECT * FROM `gamebet` WHERE gameid = '$gameid' and userid = '$userid'");
$count = mysqli_num_rows($sqlnew);
if ($count > 0) {
    $k = mysqli_fetch_assoc($sqlnew);
    if ($k['status'] == 'completed') {
        $rows['success'] = 0;
        $rows['game_status'] = $k['status'];
        $rows['response'] = "Success.";
    } else if ($k['status'] == 'running') {
        $rows['success'] = 1;
        $rows['game_status'] = $k['status'];
        $rows['response'] = "Success.";
    }
} else {
    $rows['success'] = 0;
    $rows['response'] = "Game id not found.";
}
echo (json_encode($rows));
?>