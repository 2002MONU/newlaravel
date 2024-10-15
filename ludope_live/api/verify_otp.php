<?php

include('config.php');

$mobile = $_POST['mobile'];

$otp = $_POST['otp'];

$token = md5(uniqid(rand(), true));

$sql = mysqli_query($conn, "SELECT * FROM users WHERE mobile='" . $mobile . "'");

$data = mysqli_fetch_array($sql);
//print_r($data);
//die;

if (!empty($data) && !empty($mobile)) {

    if ($data['otp'] != $otp) {
        $rows['success'] = 0;
        $rows['message'] = "Hey, You have entered the wrong OTP, Please proceed with the valid OTP";
        $rows['otp'] = $data['otp'];
    } else if ($data['otp'] == $otp) {


        $sql = mysqli_query($conn, "UPDATE users set `otp` = NULL, `otp_verified` = 'verified' WHERE id='" . $data['id'] . "'");

        $rows['success'] = 1;

        $rows['message'] = "OTP verified successfully";

        //mysqli_query($conn, "UPDATE users set `first_time_login` = 1 WHERE id='" . $user_id . "'");

        $rows['data']['first_time_login'] = 'yes';

        $sql1 = mysqli_query($conn, "SELECT * FROM users WHERE mobile='" . $mobile . "'");

        $data1 = mysqli_fetch_array($sql1);
        $rows['data']['userId'] = $data['id'];
        $rows['data']['user_name'] = $data['name'];
        $rows['data']['user_image'] = $data['profilepic'];
        $rows['data']['coins'] = $data['coins'];
        $rows['data']['email'] = $data['email'];
        $rows['data']['bonus'] = $data['bonus'];
        $rows['data']['points'] = $data['points'];
        $rows['data']['token'] = $token;
        $rows['data']['otp'] = $otp;
        $rows['data']['mobile'] = $data['mobile'];
        $rows['data']['refer'] = $data['refer'];
        $rows['data']['refercode'] = $data['refercode'];

        $rows['data']['firsttime'] = 'NO';
        $rows['data']['dob'] = $data['dob'];
        $rows['data']['otp_verified'] = $data1['otp_verified'];
        $rows['data']['winning_amount'] = $data['winning_amount'];
        $r = "SELECT `gameid` FROM `user_games` WHERE `userid` = '" . $data['id'] . "' order by id desc limit 1";
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
    $rows['message'] = "Invaid Mobile No.";
}

echo (json_encode($rows));
?>