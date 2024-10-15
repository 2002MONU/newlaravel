<?php

include('config.php');

$userid = $_POST['userid'];
$betamount = $_POST['winningamount'];
$tabletype = $_POST['tabletype'];
$gameid = $_POST['gameid'];
$game_type = $_POST['game_type'];
$score = $_POST['score'];
if (!empty($userid) && !empty($tabletype) && !empty($gameid)) {
    $gameinfo = mysqli_query($conn, "select * from game_winners where gameid='" . $gameid . "'");
    $wincount = mysqli_num_rows($gameinfo);

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
    $count = mysqli_num_rows($sql);
    if ($count > 0) {
        $sql2 = mysqli_query($conn, "SELECT * FROM gamebet WHERE gameid='" . $gameid . "' limit 1");
        $row2 = mysqli_fetch_assoc($sql2);
        //echo "SELECT * FROM gamebet WHERE gameid='" . $gameid . "' limit 1";die;
        if ($row2['tabletype'] == 14) {
            if ($wincount < 2) {
                $row = mysqli_fetch_assoc($sql);

                $sql1 = mysqli_query($conn, "SELECT * FROM gamebet WHERE gameid='" . $gameid . "' and losewin='winner'");
                $count1 = mysqli_num_rows($sql1);
                if ($count1 < 2) {
                    $total_amount = $betamount;

                    // Commission percentage
                    $commission_percentage = $constants['lite_mode_commission_percentage'];

                    // Players' percentages
                    $first_player_percentage = 60;
                    $second_player_percentage = 40;

                    // Calculate commission
                    $commission = round(($total_amount * $commission_percentage) / 100);

                    // Calculate amounts for each player
                    $first_player_amount = round(($total_amount - $commission) * $first_player_percentage / 100);
                    // Calculate amount for second player
                    $second_player_amount = round(($total_amount - $commission) * $second_player_percentage / 100);
                    if ($count1 == 0) {
                        if ($row2['game_type'] == 'Quick') {
//                        $percentage = $constants['lite_mode_commission_percentage'];
//                        $cmn = (($betamount / 100) * $percentage);
//                        $winam = (($betamount / 100) * $percentage);
//                        $coins = $row['coins'];
//                        $newcoins = $coins + $betamount - $winam;
//                        $totalwinning = $betamount - $winam;
//                        $winning_amount = $row['winning_amount'] + $totalwinning;

                            $percentage = $constants['lite_mode_commission_percentage'];
                            $cmn = $commission;
                            $winam = $first_player_amount;
                            $coins = $row['coins'];
                            $newcoins = $coins + $betamount - $winam;
                            $totalwinning = $winam;
                            $winning_amount = $row['winning_amount'] + $totalwinning;
                        } else {
                            $percentage = $constants['lite_mode_commission_percentage'];
                            $cmn = $commission;
                            $winam = $first_player_amount;
                            $coins = $row['coins'];
                            $newcoins = $coins + $betamount - $winam;
                            $totalwinning = $winam;
                            $winning_amount = $row['winning_amount'] + $totalwinning;
                        }

                        mysqli_query($conn, "INSERT INTO `game_winners`( `gameid`, `user_id`, `created_date`) VALUES ('" . $gameid . "', '" . $userid . "','" . $current_timestamp . "')");
                        $last_id = mysqli_insert_id($conn);

                        mysqli_query($conn, "INSERT INTO `trans` (`tid`, `trntype`, `uid`, `amount`,`closingcoins`, `updatedcoins`,`crdr`, `datetime`,`gameid`, `game_winners_table_id`, `page_name`) VALUES (NULL, 'Game Winner', '" . $userid . "', '" . $totalwinning . "', '" . $coins . "','" . $newcoins . "', 'Cr', '" . $current_timestamp . "','" . $gameid . "', '" . $last_id . "', 'game winner')");
                        if ($count1 == 1 || $row2['game_type'] == 'Quick') {
                            mysqli_query($conn, "update gamebet set  gamecomplete='" . $current_timestamp . "', status='completed' WHERE gameid='" . $gameid . "' AND userid != '" . $userid . "' AND status!='completed'");
                        }
                        mysqli_query($conn, "update gamebet set wng_amount='" . $totalwinning . "',commission_amount='" . $cmn . "', gamecomplete='" . $current_timestamp . "', losewin='winner', status='completed' WHERE gameid='" . $gameid . "' AND userid='" . $userid . "'");

                        mysqli_query($conn, "update users set winning_amount='" . $winning_amount . "' WHERE id='" . $userid . "'");
                    }
                    if ($count1 == 1) {
                        $cmn = '0';
                        $winam = $second_player_amount;
                        $coins = $row['coins'];
                        $newcoins = $coins + $winam;
                        $totalwinning = $winam;
                        $winning_amount = $row['winning_amount'] + $totalwinning;
                        mysqli_query($conn, "INSERT INTO `game_winners`( `gameid`, `user_id`, `created_date`) VALUES ('" . $gameid . "', '" . $userid . "','" . $current_timestamp . "')");
                        $last_id = mysqli_insert_id($conn);

                        mysqli_query($conn, "INSERT INTO `trans` (`tid`, `trntype`, `uid`, `amount`,`closingcoins`, `updatedcoins`,`crdr`, `datetime`,`gameid`, `game_winners_table_id`, `page_name`) VALUES (NULL, 'Game Winner', '" . $userid . "', '" . $totalwinning . "', '" . $coins . "','" . $newcoins . "', 'Cr', '" . $current_timestamp . "','" . $gameid . "', '" . $last_id . "', 'game winner')");
                        if ($count1 == 1 || $row2['game_type'] == 'Quick') {
                            mysqli_query($conn, "update gamebet set  gamecomplete='" . $current_timestamp . "', status='completed' WHERE gameid='" . $gameid . "' AND userid != '" . $userid . "' AND status!='completed'");
                        }
                        mysqli_query($conn, "update gamebet set wng_amount='" . $totalwinning . "',commission_amount='" . $cmn . "', gamecomplete='" . $current_timestamp . "', losewin='winner', status='completed' WHERE gameid='" . $gameid . "' AND userid='" . $userid . "'");

                        mysqli_query($conn, "update users set winning_amount='" . $winning_amount . "' WHERE id='" . $userid . "'");
                    }
                }

                $rows['success'] = 1;
                $rows['message'] = "Winner coins successfully transferred";
                $rows['data']['coins'] = $newcoins;
            } else {
                $rows['success'] = 1;
                $rows['message'] = "Winner coins successfully transferred";
                $rows['data']['coins'] = $row['coins'];
            }
        }

        ////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////
        else {
//            $game_bet = mysqli_query($conn, "select * from gamebet where gameid='" . $gameid . "' LIMIT 1");
//            $game_details = mysqli_fetch_assoc($game_bet);
//
//            $bets = $game_details['amount'] * 2;

            $row = mysqli_fetch_assoc($sql);

            $sql1 = mysqli_query($conn, "SELECT * FROM gamebet WHERE gameid='" . $gameid . "' and losewin='winner' limit 1");
            $count1 = mysqli_num_rows($sql1);
            if ($count1 == 0) {


                if ($constants['global_commission_percentage'] != '') {
                    $percentage = $constants['global_commission_percentage'];
                } else {
                    $percentage = 10;
                }

                $winam = ($betamount / 100) * $percentage;

                $coins = $row['coins'];
                $newcoins = $coins + $betamount - $winam;
                $totalwinning = $betamount - $winam;
                $winning_amount = $row['winning_amount'] + $totalwinning;

                mysqli_query($conn, "INSERT INTO `game_winners`( `gameid`, `user_id`, `created_date`) VALUES ('" . $gameid . "', '" . $userid . "','" . $current_timestamp . "')");
                $last_id = mysqli_insert_id($conn);

                mysqli_query($conn, "INSERT INTO `trans` (`tid`, `trntype`, `uid`, `amount`,`closingcoins`, `updatedcoins`,`crdr`, `datetime`,`gameid`, `game_winners_table_id`, `page_name`) VALUES (NULL, 'Game Winner', '" . $userid . "', '" . $totalwinning . "', '" . $coins . "','" . $newcoins . "', 'Cr', '" . $current_timestamp . "','" . $gameid . "', '" . $last_id . "', 'game winner')");

                mysqli_query($conn, "update gamebet set  gamecomplete='" . $current_timestamp . "', status='completed' WHERE gameid='" . $gameid . "' AND userid != '" . $userid . "'");
                mysqli_query($conn, "update gamebet set wng_amount='" . $totalwinning . "',commission_amount='" . $winam . "', gamecomplete='" . $current_timestamp . "', losewin='winner', status='completed' WHERE gameid='" . $gameid . "' AND userid='" . $userid . "'");

                mysqli_query($conn, "update users set winning_amount='" . $winning_amount . "' WHERE id='" . $userid . "'");

                $rows['success'] = 1;
                $rows['message'] = "Winner coins successfully transferred";
                $rows['data']['coins'] = $newcoins;
            } else {
                $rows['success'] = 1;
                $rows['message'] = "Winner coins successfully transferred";
                $rows['data']['coins'] = $row['coins'];
            }
        }
    }
} else {
    $rows['success'] = 0;
    $rows['response'] = "Some error occurred. Please try again. ";
}

echo (json_encode($rows));
