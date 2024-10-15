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

$sqlnew = mysqli_query($conn, "SELECT * FROM `gamebet` WHERE gameid = '$gameid' and userid = '$userid'");
$count = mysqli_num_rows($sqlnew);
if ($count > 0) {
    $k = mysqli_fetch_assoc($sqlnew);
    if (empty($k['minimize_time'])) {
        $diff = 0;
    } else {
        $diff = time() - intval($k['minimize_time']);
    }
    $rows['success'] = 1;
    $rows['difference'] = $diff;
    $rows['response'] = "Success.";
} else {
    $rows['success'] = 0;
    $rows['response'] = "Game id not found.";
}
echo (json_encode($rows));
?>