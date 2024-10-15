<?php

include("config.php");

$socailLoginId = $_POST['socailLoginId'];

$name = $_POST['name'];

$profile = $_POST['profilepic'];

$fb_id = $_POST['fb_id'];

$otp = '1234';


//$otp = mt_rand(100000, 999999);

$token = md5(uniqid(rand(), true));

$size = 8;

$refercode = strtoupper(substr(md5(time() . rand(10000, 99999)), 0, $size));

//$refercode =  preg_replace(array('/^\[/','/\]$/'), '',$refercode);

$refercode = str_replace(array('i', 'o'), '', $refercode);

$lastlogin = date("Y-m-d H:i:s");

if (!empty($otp) && !empty($socailLoginId)) {

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE socailLoginId='" . $socailLoginId . "'");

    $count = mysqli_num_rows($sql);

    if ($count > 0) {

        while ($row = mysqli_fetch_assoc($sql)) {



            $rows['success'] = 1;

            $rows['message'] = "User Details";

            $rows['data']['userId'] = $row['id'];

            $rows['data']['user_name'] = $row['name'];

            $rows['data']['user_image'] = $row['profilepic'];

            $rows['data']['coins'] = $row['coins'];

            //$rows['data']['email'] = $row['email'];

            $rows['data']['bonus'] = $row['bonus'];

            $rows['data']['points'] = $row['points'];

            $rows['data']['token'] = $token;

            $rows['data']['otp'] = $otp;

            $rows['data']['mobile'] = $row['mobile'];

            $rows['data']['refer'] = $row['refer'];

            $rows['data']['refercode'] = $row['refercode'];

            $rows['data']['firsttime'] = 'NO';
            $rows['data']['dob'] = $row['dob'];
            $rows['data']['otp_verified'] = $row['otp_verified'];
            $rows['data']['winning_amount'] = $row['winning_amount'];

            $r = "SELECT `gameid` FROM `user_games` WHERE `userid` = '" . $row['id'] . "' order by id desc limit 1";
            $sq = mysqli_query($conn, $r);
            $c = mysqli_num_rows($sq);
            if ($c > 0) {
                $rows['data']['last_game_id'] = mysqli_fetch_assoc($sq)['gameid'];
            } else {
                $rows['data']['last_game_id'] = '';
            }

            $insertquery = mysqli_query($conn, "update users set lastlogin='" . $lastlogin . "', token='" . $token . "' WHERE email='" . $email . "'");

            $insertquery;
        }
    } else {



        $size = 8;

        $refercode = strtoupper(substr(md5(time() . rand(10000, 99999)), 0, $size));

        $coins = '0';
        if ($Playstore == 'YES') {
            $coins = '0';
        }

        $sqlr = "INSERT INTO `users` (`id`, `name`, `tournament`, `coins`, `points`, `bonus`, `email`, `mobile`, `password`, `profilepic`, `token`, `lastlogin`, `refer`, `status`, `registerd`, `refercode`,`socailLoginId`) VALUES (NULL, '" . $name . "', '0', '" . $coins . "', '0', '0', '" . $email . "', NULL , NULL, '" . $profile . "', '" . $token . "','" . $lastlogin . "',  'NO', '1', '" . $current_timestamp . "', '" . $refercode . "','".$socailLoginId."')";



        $subject = "$app_name - OTP request";
        $message = "<html><body>";
        $message .= "<h3>Hello ' . $name . ',!</h3>";
        $message .= "<p>Your OTP is " . $otp . ".</p>";
        $message .= "<p>Thanks and Regards</p>";
        $message .= "<p>$app_name</p>";
        $message .= "</body></html>";


// Always set content-type when sending HTML email
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= "From: <$from_email>" . "\r\n";
        //mail($email, $subject, $message, $headers);

        $result = mysqli_query($conn, $sqlr);

        $user_id = mysqli_insert_id($conn);



        $rows['message'] = "User Details";

        $rows['data']['userId'] = $user_id;

        $rows['success'] = 1;

        $rows['data']['user_name'] = $name;

        $rows['data']['user_image'] = $profile;

        $rows['data']['token'] = $token;

        $rows['data']['coins'] = $coins;

        $rows['data']['bonus'] = '0';

        $rows['data']['otp'] = $otp;

        $rows['data']['email'] = $email;

        $rows['data']['points'] = '0';

        $rows['data']['refercode'] = $refercode;

        $rows['data']['firsttime'] = 'YES';
        $rows['data']['dob'] = '';
        $rows['data']['otp_verified'] = 'not_verified';
        $rows['winning_amount'] = '0';

        $r = "SELECT `gameid` FROM `user_games` WHERE `userid` = '" . $user_id . "' order by id desc limit 1";
        $sq = mysqli_query($conn, $r);
        $c = mysqli_num_rows($sq);
        if ($c > 0) {
            $rows['data']['last_game_id'] = mysqli_fetch_assoc($sq)['gameid'];
        } else {
            $rows['data']['last_game_id'] = '';
        }
    }
} else {

    $rows['success'] = 0;

    $rows['response'] = "Some error occurred. Please try again.";
}



echo (json_encode($rows));
