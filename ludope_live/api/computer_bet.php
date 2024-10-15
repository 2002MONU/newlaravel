<?php

include('config.php');
$userid = $_POST['userid'];
$betamount = $_POST['betamount'];
$tabletype = $_POST['tabletype'];
$gameid = $_POST['gameid'];

if ($userid != '' && $betamount != '' && $tabletype != '' && $gameid != '') {

    $bet = "INSERT INTO `gamebet` (`id`, `tabletype`, `amount`, `gameid`, `userid`, `gtime`, `status`, `user_type`) VALUES (NULL, '" . $tabletype . "', '" . $betamount . "', '" . $gameid . "', '" . $userid . "','" . $current_timestamp . "', 'running','computer')";

    $result = mysqli_query($conn, $bet);
    $betid = mysqli_insert_id($conn);
    $rows['success'] = 1;
    $rows['message'] = "Bet successfully marked";
    $rows['data']['betid'] = $betid;
} else {
    $rows['success'] = 0;
    $rows['response'] = "Bet Not marked, Some error occurred. Please try again. ";
}

echo (json_encode($rows));
