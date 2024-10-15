<?php

include('config.php');
$userid = $_POST['userid'];
$betamount = $_POST['winningamount'];
$tabletype = $_POST['tabletype'];
$gameid = $_POST['gameid'];


if (!empty($userid) && !empty($betamount) && !empty($tabletype) && !empty($gameid)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
    $count = mysqli_num_rows($sql);
    if ($count > 0) {
        $row = mysqli_fetch_assoc($sql);
        //  $bonus = $row['bonus'] - $betamount;
        if ($constants['commission_percentage'] != '') {
            $percentage = $constants['commission_percentage'];
        } else {
            $percentage = 10;
        }

        //$winam = ($percentage / 100) * $betamount;
        $winam = ($betamount / 100) * $percentage;


        $coins = $row['coins'];
        $newcoins = $coins + $betamount - $winam;
        $totalwinning = $betamount - $winam;
        $winning_amount = $row['winning_amount'] + $totalwinning;

        /* Update transactions after bet */

        $updattrns = "INSERT INTO `trans` (`tid`, `trntype`, `uid`, `amount`,`closingcoins`, `updatedcoins`,`crdr`, `datetime`,`gameid`) VALUES (NULL, 'Game Winner', '" . $userid . "', '" . $totalwinning . "', '" . $coins . "','" . $newcoins . "', 'Cr', '" . $current_timestamp . "','" . $gameid . "')";
        $runqury = mysqli_query($conn, $updattrns);

        /* Update Admin Winn */

        //$updaadmin ="INSERT INTO `adminwinning` (`id`,  `type`, `amount`, `date`) VALUES (NULL, 'Game Win', '".$winam."', CURRENT_TIMESTAMP)";
        // $insert = mysqli_query($conn, $updaadmin);
        //  $bet="INSERT INTO `gamebet` (`id`, `tabletype`, `amount`, `gameid`, `userid`, `gtime`, `status`) VALUES (NULL, '".$tabletype."', '".$betamount."', '".$gameid."', '".$userid."', CURRENT_TIMESTAMP, 'running')";
        // $result = mysqli_query($conn, $bet);

        mysqli_query($conn, "update gamebet set  gamecomplete='" . $current_timestamp . "', status='completed' WHERE gameid='" . $gameid . "' AND userid != '" . $userid . "'");


        $insertquery = mysqli_query($conn, "update gamebet set wng_amount='" . $totalwinning . "',commission_amount='" . $winam . "', gamecomplete='" . $current_timestamp . "', losewin='winner', status='completed' WHERE gameid='" . $gameid . "' AND userid='" . $userid . "'");
        $insertquery;

        /* Update coins after bet */
//        coins='" . $newcoins . "',
        $insertquery = mysqli_query($conn, "update users set winning_amount='" . $winning_amount . "' WHERE id='" . $userid . "'");
        $insertquery;

        $rows['success'] = 1;
        $rows['message'] = "Winner coins successfully transferred";
        $rows['data']['coins'] = $newcoins;
    }
} else {
    $rows['success'] = 0;
    $rows['response'] = "Some error occurred. Please try again. ";
}

echo (json_encode($rows));
