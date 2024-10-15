<?php

include("config.php");
$userid = $_POST['userid'];

if ($userid == '') {
    $rows['success'] = 0;
    $rows['response'] = "User Id required";
    echo (json_encode($rows));
    die;
}
//echo "SELECT * FROM `gamebet` WHERE userid = '$userid' GROUP by gameid order by id 'DESC' limit 1";
$sqlnew = mysqli_query($conn, "SELECT * FROM `gamebet` WHERE userid = '$userid' GROUP by gameid order by id DESC limit 1");
$count = mysqli_num_rows($sqlnew);
if ($count > 0) {
    $k = mysqli_fetch_assoc($sqlnew);
    if ($k['status'] == 'completed') {
        $rows['success'] = 0;
        $rows['game_status'] = $k['status'];
        $rows['gameid'] = $k['gameid'];
        $rows['response'] = "Success.";
    } else if ($k['status'] == 'running') {
        $rows['success'] = 1;
        $rows['game_status'] = $k['status'];
        $rows['gameid'] = $k['gameid'];
        $rows['response'] = "Success.";
    }
} else {
    $rows['success'] = 0;
    $rows['response'] = "No games found.";
}
echo (json_encode($rows));
?>