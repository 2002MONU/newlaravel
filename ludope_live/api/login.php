<?php

include('config.php');
$mobile = $_POST['mobile'];
$nootp = $_POST['otp'];
$ver = $_POST['ver'];
$email = $_POST['email'];
$device_id = $_POST['device_id'];
$fcm_token = $_POST['fcm_token'];

$token = md5(uniqid(rand(), true));
$size = 8;
$refercode = strtoupper(substr(md5(time() . rand(10000, 99999)), 0, $size));
//$refercode =  preg_replace(array('/^\[/','/\]$/'), '',$refercode);
$refercode = str_replace(array('i', 'o'), '', $refercode);

if (!empty($mobile)) {


    $lastlogin = date("Y-m-d H:i:s");
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE mobile='" . $mobile . "'");
    $count = mysqli_num_rows($sql);
    if ($count > 0) {

        while ($row = mysqli_fetch_assoc($sql)) {
            if ($row['mobile'] == '9719325299') {
                $otp = 12345;
            }
            $otp = rand(pow(10, 5 - 1), pow(10, 5) - 1);

            //$admin_message = "Hi Sai, Your one time password for phone verification is $otp";
            //$admin_message = "Your LUDO One Time Password(OTP) is- " . $otp . " Don't share Your OTP to anyone.";
            //$message = urlencode($admin_message);

            if ($nootp == 'yes') {

                $URL = 'https://2factor.in/API/V1/42eb516a-23eb-11ee-addf-0200cd936042/SMS/' . $mobile . '/' . $otp . '/Ludope3OTP';

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $URL);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_exec($ch);
            }






            $games_won = mysqli_query($conn, "SELECT COALESCE(COUNT(id),0) as total from gamebet where userid = '" . $row['id'] . "' AND losewin = 'winner' ");
            $games_lost = mysqli_query($conn, "SELECT COALESCE(COUNT(id),0) as total from gamebet where userid = '" . $row['id'] . "' AND losewin is NULL AND status = 'completed' ");
            $total_games_won = mysqli_fetch_assoc($games_won)['total'];
            $total_games_lost = mysqli_fetch_assoc($games_lost)['total'];

            //2players and 4player games
            $two_player = mysqli_query($conn, "select * from gamebet where userid='" . $row['id'] . "' AND tabletype= '12' AND losewin= 'winner' ORDER BY id DESC");
            $two_won = mysqli_num_rows($two_player);

            $four_player = mysqli_query($conn, "select * from gamebet where userid='" . $row['id'] . "' AND tabletype= '14' AND losewin= 'winner' ORDER BY id DESC");
            $four_won = mysqli_num_rows($four_player);
            $rows['success'] = 1;
            $rows['message'] = "User Details";
            $rows['data']['userId'] = $row['id'];
            $rows['data']['user_name'] = $row['name'];
            $rows['data']['user_image'] = $row['profilepic'];
            $rows['data']['coins'] = $row['coins'];
            $rows['data']['email'] = $row['email'];
            $rows['data']['bonus'] = $row['bonus'];
            $rows['data']['points'] = $row['points'];
            $rows['data']['token'] = $token;
            $rows['data']['otp'] = $otp;
            $rows['data']['mobile'] = $row['mobile'];
            $rows['data']['refer'] = $row['refer'];
            $rows['data']['refercode'] = $row['refercode'];

            $rows['data']['total_games_won'] = $total_games_won;
            $rows['data']['total_games_lost'] = $total_games_lost;
            $rows['data']['two_player_wins_total'] = $two_won;
            $rows['data']['four_player_wins_total'] = $four_won;
            $rows['data']['firsttime'] = 'NO';
//            $rows['data']['firsttimelogin'] = 'NO';
            $rows['data']['name_verified'] = 'YES';

            $rows['data']['dob'] = $row['dob'];
            $rows['data']['otp_verified'] = $row['otp_verified'];
            $rows['data']['email_verified'] = $row['email_verified'];
            $rows['data']['winning_amount'] = $row['winning_amount'];

            $rows['data']['total_wallet_balance'] = $row['coins'] + $row['bonus'] + $row['winning_amount'];

//mysqli_query($conn, "update users set `otp` = $otp WHERE mobile='" . $mobile . "'");

            /* $admin_message = "Your Ludo One Time Password(OTP) is- $otp Don't share Your OTP to anyone.
              Regards
              CM-Ludo";

              $message = urlencode($admin_message);
              send_sms($mobile, $message, 1407165546675793294); */



            mysqli_query($conn, "update users set `otp`='" . $otp . "',`device_id`='" . $device_id . "' WHERE mobile='" . $mobile . "'");

            $r = "SELECT `gameid` FROM `user_games` WHERE `userid` = '" . $row['id'] . "' order by id desc limit 1";
            $sq = mysqli_query($conn, $r);
            $c = mysqli_num_rows($sq);
            if ($c > 0) {
                $rows['data']['last_game_id'] = mysqli_fetch_assoc($sq)['gameid'];
            } else {
                $rows['data']['last_game_id'] = '';
            }


            mysqli_query($conn, "update users set lastlogin='" . $lastlogin . "', token='" . $token . "' , first_time_login='1'  WHERE mobile='" . $mobile . "'");
        }
    } else {


        $otp = rand(pow(10, 5 - 1), pow(10, 5) - 1);
        $name = 'Demo';
        $profile = $img_path . 'profile.jpg';
        $bonus = $constants['signup_amount'];
        $sqlr = "INSERT INTO `users` (`name`, `tournament`, `coins`, `points`, `bonus`, `email`, `mobile`, `password`, `profilepic`, `token`, `lastlogin`, `refer`, `status`, `registerd`, `refercode`, `otp`,`device_id`,`fcm_token`,`first_time_login`) VALUES ('" . $name . "', '0', '0', '0', '" . $bonus . "', '" . $email . "', '" . $mobile . "',  '" . $lastlogin . "','" . $profile . "', '" . $token . "', NULL, 'NO', '1', CURRENT_TIMESTAMP, '" . $refercode . "', $otp,'" . $device_id . "','" . $fcm_token . "','0')";

        $result = mysqli_query($conn, $sqlr);
        $user_id = mysqli_insert_id($conn);
        $coins = '0';
        //Your {#var#} One Time Password(OTP) is- {#var#} Don't share Your OTP to anyone.
//        $admin_message = "Your Ludo One Time Password(OTP) is- $otp Don't share Your OTP to anyone.
//Regards
//CM-Ludo";
//        $message = urlencode($admin_message);
//        send_sms($mobile, $message, 1407165546675793294);
        //$admin_message = "Hi Sai, Your one time password for phone verification is $otp";
        //$admin_message = "Your LUDO One Time Password(OTP) is- " . $otp . " Don't share Your OTP to anyone.";
        //$message = urlencode($admin_message);



        $URL = 'https://2factor.in/API/V1/42eb516a-23eb-11ee-addf-0200cd936042/SMS/' . $mobile . '/' . $otp . '/Ludope3OTP';

        //$URL = 'https://2factor.in/API/R1/?module=TRANS_SMS&apikey=42eb516a-23eb-11ee-addf-0200cd936042&to="' . $mobile . '"&from=LUDOPE&msg="' . $message . '"'; // connecting url
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);

        $rows['message'] = "User Details";
        $rows['data']['userId'] = $user_id;
        $rows['success'] = 1;

        $rows['data']['user_name'] = $name;
        $rows['data']['user_image'] = $profile;
        $rows['data']['token'] = $token;
        $rows['data']['coins'] = $coins;
        $rows['data']['bonus'] = '0';
        $rows['data']['otp'] = $otp;
        $rows['data']['mobile'] = $mobile;
        $rows['data']['points'] = '0';
        $rows['data']['refercode'] = $refercode;
        $rows['data']['email_verified'] = 'NO';
        $rows['data']['name_verified'] = 'NO';

        $rows['data']['total_games_won'] = $total_games_won;
        $rows['data']['total_games_lost'] = $total_games_lost;
//        $rows['data']['firsttimelogin'] = 'YES';

        $rows['data']['firsttime'] = 'YES';
        $rows['data']['dob'] = '';
        $rows['data']['otp_verified'] = 'not_verified';
        $rows['data']['winning_amount'] = '0';

        $rows['data']['total_wallet_balance'] = $row['coins'] + $row['bonus'] + $row['winning_amount'];
    }

    echo (json_encode($rows));
    exit;
}
?>