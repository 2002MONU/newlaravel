<?php

include('config.php');

$user_id = $_POST['user_id'];

$sql = mysqli_query($conn, "SELECT distinct(gameid) FROM trans WHERE uid='" . $user_id . "' and ipaddress IS NULL order by tid DESC");

$count = mysqli_num_rows($sql);
if ($count > 0) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($sql)) {

        $check_sql_row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM trans WHERE uid='" . $user_id . "' and gameid= '$row[gameid]' order by tid desc limit 1"));

        $rows['success'] = 1;
        $rows['message'] = "Game History successfully";
        $rows['data'][$i] = $check_sql_row;
        $i++;
    }
} else {
    $rows['success'] = 0;
    $rows['message'] = "user id not matched Or empty ";
}

echo (json_encode($rows));
?>