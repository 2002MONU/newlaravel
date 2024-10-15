<?php

include('config.php');
$gameid = $_POST['gameid'];
$userid = $_POST['userid'];

if ($constants['global_commission_percentage'] != '') {
    $percentage = $constants['global_commission_percentage'];
} else {
    $percentage = 10;
}

if (!empty($gameid) && !empty($userid)) {
    $gameinfo = mysqli_query($conn, "select * from game_winners where gameid='" . $gameid . "'");
    $wincount = mysqli_num_rows($gameinfo);
    if ($wincount == 0) {

        mysqli_query($conn, "update gamebet set  gamecomplete='" . $current_timestamp . "', status='completed' WHERE gameid='" . $gameid . "' and userid = '" . $userid . "'");

        $touserinfo = mysqli_query($conn, "select gamebet.* from gamebet where gameid='" . $gameid . "' LIMIT 1");
        $user = mysqli_fetch_assoc($touserinfo);
        $table = $user['tabletype'];
        if ($table == '12' || $table == '22') {

            $touserinfo = mysqli_query($conn, "select gamebet.* from gamebet where gameid='" . $gameid . "' and userid != '" . $userid . "' LIMIT 1");
            $user = mysqli_fetch_assoc($touserinfo);
            if ($user['userid'] == 0 || $user['userid'] == '0') {
                mysqli_query($conn, "update gamebet set losewin = 'winner', gamecomplete='" . $current_timestamp . "', status='completed' WHERE gameid='" . $gameid . "' and userid!='" . $userid . "'");
                $rows['success'] = 1;
                $rows['message'] = "successfully Updated";
            } else {

                $userid = $user['userid'];
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
                $row = mysqli_fetch_assoc($sql);

                $touserinfo = mysqli_query($conn, "select SUM(amount) as bet_amount from gamebet where gameid='" . $gameid . "'");
                $bet = mysqli_fetch_assoc($touserinfo);
                $betamount = $bet['bet_amount']; // bet amount
                $winam = ($betamount / 100) * $percentage; //commision amount

                $coins = $row['coins'];
                $newcoins = $coins + $betamount - $winam;
                $totalwinning = $betamount - $winam;
                $winning_amount = $row['winning_amount'] + $totalwinning;

                $sql1 = mysqli_query($conn, "SELECT * FROM gamebet WHERE gameid='" . $gameid . "' and losewin='winner' group by datetime limit 1");
                $count1 = mysqli_num_rows($sql1);
                if ($count1 == 0) {
//                $updattrns = "INSERT INTO `trans` (`tid`, `trntype`, `uid`, `amount`,`closingcoins`, `updatedcoins`,`crdr`, `datetime`,`gameid`) VALUES (NULL, 'Game Winner', '" . $userid . "', '" . $totalwinning . "', '" . $coins . "','" . $newcoins . "', 'Cr', '" . $current_timestamp . "','" . $gameid . "')";
//                $runqury = mysqli_query($conn, $updattrns);

                    mysqli_query($conn, "INSERT INTO `game_winners`( `gameid`, `user_id`, `created_date`) VALUES ('" . $gameid . "', '" . $userid . "','" . $current_timestamp . "')");
                    $last_id = mysqli_insert_id($conn);

                    $updattrns = "INSERT INTO `trans` (`tid`, `trntype`, `uid`, `amount`,`closingcoins`, `updatedcoins`,`crdr`, `datetime`,`gameid`, `game_winners_table_id`, `page_name`) VALUES (NULL, 'Game Winner', '" . $userid . "', '" . $totalwinning . "', '" . $coins . "','" . $newcoins . "', 'Cr', '" . $current_timestamp . "','" . $gameid . "', '" . $last_id . "', 'exit from game')";
                    $runqury = mysqli_query($conn, $updattrns);

                    mysqli_query($conn, "update gamebet set wng_amount='" . $totalwinning . "',commission_amount='" . $winam . "', gamecomplete='" . $current_timestamp . "', losewin='winner', status='completed' WHERE gameid='" . $gameid . "' AND userid = '" . $userid . "'");
                    mysqli_query($conn, "update users set winning_amount='" . $winning_amount . "' WHERE id='" . $userid . "'");
                }
                $rows['success'] = 1;
                $rows['message'] = "successfully Updated";
            }
        } else {

            $percentage = $constants['first_commission_percentage'];
            $touserinfo = mysqli_query($conn, "select gamebet.* from gamebet where gameid='" . $gameid . "' and status = 'running'");
            $count = mysqli_num_rows($touserinfo);
            if ($count == 1) {
                $user = mysqli_fetch_assoc($touserinfo);
                if ($user['userid'] == 0 || $user['userid'] == '0') {
                    mysqli_query($conn, "update gamebet set losewin = 'winner', gamecomplete='" . $current_timestamp . "', status='completed' WHERE gameid='" . $gameid . "' and userid !='" . $userid . "'");
                } else {
                    $userid = $user ['userid'];
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
                    $row = mysqli_fetch_assoc($sql);

                    $touserinfo = mysqli_query($conn, "select SUM(amount) as bet_amount from gamebet where gameid='" . $gameid . "'");
                    $bet = mysqli_fetch_assoc($touserinfo);
                    $betamount = $bet['bet_amount']; // bet amount
                    $winam = ($betamount / 100) * $percentage; //commision amount

                    $coins = $row ['coins'];
                    $newcoins = $coins + $betamount - $winam;
                    $totalwinning = $betamount - $winam;
                    $winning_amount = $row['winning_amount'] + $totalwinning;
                    $sql1 = mysqli_query($conn, "SELECT * FROM gamebet WHERE gameid='" . $gameid . "' and losewin='winner' group by datetime limit 1");
                    $count1 = mysqli_num_rows($sql1);
                    if ($count1 == 0) {

                        mysqli_query($conn, "INSERT INTO `game_winners`( `gameid`, `user_id`, `created_date`) VALUES ('" . $gameid . "', '" . $userid . "','" . $current_timestamp . "')");
                        $last_id = mysqli_insert_id($conn);

                        $updattrns = "INSERT INTO `trans` (`tid`, `trntype`, `uid`, `amount`,`closingcoins`, `updatedcoins`,`crdr`, `datetime`,`gameid`, `game_winners_table_id`) VALUES (NULL, 'Game Exit', '" . $userid . "', '" . $totalwinning . "', '" . $coins . "','" . $newcoins . "', 'Cr', '" . $current_timestamp . "','" . $gameid . "', '" . $last_id . "')";
                        $runqury = mysqli_query($conn, $updattrns);

                        $insertquery = mysqli_query($conn, "update gamebet set wng_amount='" . $totalwinning . "',commission_amount='" . $winam . "', gamecomplete='" . $current_timestamp . "', losewin='winner', status='completed' WHERE gameid='" . $gameid . "' AND userid = '" . $userid . "'");
                        $insertquery = mysqli_query($conn, "update users set winning_amount='" . $winning_amount . "' WHERE id='" . $userid . "'");
                        $insertquery;
                    }
                    $rows ['success'] = 1;
                    $rows['message'] = "successfully Updated";
                }
            }
        }
    } else {
        $rows['success'] = 1;
        $rows['response'] = "successfully Updated";
    }
} else {
    $rows['success'] = 0;
    $rows['response'] = "Game Id AND User ID required. Please try again. ";
}

echo(json_encode($rows));
?>