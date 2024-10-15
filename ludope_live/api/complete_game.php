<?php

include('config.php');
$gameid = $_POST['gameid'];

if (!empty($gameid)) {
    mysqli_query($conn, "update gamebet set  gamecomplete='" . $current_timestamp . "', status='completed' WHERE gameid='" . $gameid . "'");

    $rows['success'] = 1;
    $rows['message'] = "Game status successfully transferred";
} else {
    $rows['success'] = 0;
    $rows['response'] = "Some error occurred. Please try again. ";
}

echo (json_encode($rows));
?>