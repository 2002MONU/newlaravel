<?php

include('config.php');
$userid = $_POST['userid'];
$betamount = $_POST['betamount'];
$tabletype = $_POST['tabletype'];
$gameid = $_POST['gameid'];
$game_type = $_POST['game_type'];

/*
  print_r($_POST);
  print_r($_REQUEST);
  var_dump($userid);
  var_dump($betamount);
  var_dump($tabletype);
  var_dump($gameid);
  die; */

if (!empty($userid) && !empty($tabletype) && !empty($gameid)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "' and status = 1");
    $count = mysqli_num_rows($sql);
    if ($count > 0) {
        $row = mysqli_fetch_assoc($sql);
        $total_amount = $row['coins'] + $row['bonus'] + $row['winning_amount'];

//
//        function thefunction($number) {
//            if ($number < 0)
//                return 0;
//            return $number;
//        }
//
//        $newbonus = thefunction($bonus);
//        $remaining = ltrim($bonus, '-');

        $coins = $row['coins'];
        $bonus = $row['bonus'];
        $winning_amount = $row['winning_amount'];
//        $remcoin = $coins - $remaining;
//        $remcoins = ltrim($remcoin, '-');
        if ($total_amount < $betamount) {
            $rows['success'] = 0;
            $rows['response'] = "Sorry your balance is not sufficient.";
            echo (json_encode($rows));
            exit;
        } else {
            if ($coins < $betamount) {
                $deductable_bonus = $betamount - $coins;
                if ($bonus < $deductable_bonus) {
                    $deductable_winning_amount = $betamount - ($coins + $bonus);
                } else {
                    $deductable_winning_amount = 0;
                }
            } else {
                $deductable_bonus = 0;
                $deductable_winning_amount = 0;
            }

            if ($deductable_bonus > 0) {
                $newcoins = $coins - ($betamount - $deductable_bonus);
            } else {
                $newcoins = $coins - $betamount;
            }

            if ($deductable_winning_amount > 0) {
                $updated_winning_amount = $winning_amount - $deductable_winning_amount;
                $newbonus = 0;
            } else {
                $updated_winning_amount = $winning_amount;
                $newbonus = $bonus - $deductable_bonus;
            }



            /* Update coins after bet */
//            if ($newcoins < $row['winning_amount']) {
//                $winning_amount = $newcoins;
//            } else {
//                $winning_amount = $row['winning_amount'];
//            }
            //$insertquery = mysqli_query($conn, "update users set bonus='" . $newbonus . "', coins='" . $newcoins . "', winning_amount='" . $winning_amount . "' WHERE id='" . $userid . "'");
            $insertquery = mysqli_query($conn, "update users set winning_amount = '" . $updated_winning_amount . "', bonus='" . $newbonus . "', coins='" . $newcoins . "' WHERE id='" . $userid . "'");
            $insertquery;

            /* Update transactions after bet */

            $updattrns = "INSERT INTO `trans` (`tid`, `trntype`, `uid`, `amount`,`closingcoins`, `updatedcoins`,`crdr`, `datetime`,`gameid`) VALUES (NULL, 'BET', '" . $userid . "', '" . $betamount . "', '" . $coins . "','" . $newcoins . "', 'Dr', '" . $current_timestamp . "', '" . $gameid . "')";
            $runqury = mysqli_query($conn, $updattrns);

            /* MARK BET */
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $bet = "INSERT INTO `gamebet` (`id`, `tabletype`, `amount`, `gameid`, `userid`, `gtime`, `status`,`game_type`,`ipaddress`) VALUES (NULL, '" . $tabletype . "', '" . $betamount . "', '" . $gameid . "', '" . $userid . "','" . $current_timestamp . "', 'running','" . $game_type . "','" . $ip_address . "')";

            $result = mysqli_query($conn, $bet);
            $betid = mysqli_insert_id($conn);
            $rows['success'] = 1;
            $rows['message'] = "Bet successfully marked";
            $rows['data']['betid'] = $betid;
            $rows['data']['coins'] = $newcoins;
            $rows['data']['bonus'] = $newbonus;
        }
    }
} else {
    $rows['success'] = 0;
    $rows['response'] = "Bet Not marked, Some error occurred. Please try again. ";
}

echo (json_encode($rows));
