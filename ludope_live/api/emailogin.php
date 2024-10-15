<?php

include('config.php');

$mobile = $_POST['mobile_number'];
$password = $_POST['password'];
$ver = $_POST['ver'];
$fcm_token = $_POST['fcm_token'];
$token = $_POST['fcm_token'];
//if ($ver < $apk_version) {
//    $rows['success'] = 2;
//    $rows['message'] = "You are using old application, Please Download Our New App form our website ($domain_name)";
//    $rows['download'] = $apk_url;
//    echo (json_encode($rows));
//    exit;
//}
//$token = md5(uniqid(rand(), true));
//echo "SELECT * FROM users WHERE mobile='" . $mobile . "' AND BINARY password='" . $password . "' AND status='1'";die;
$sql = mysqli_query($conn, "SELECT * FROM users WHERE mobile='" . $mobile . "' AND BINARY password='" . $password . "' AND status='1'");
$count = mysqli_num_rows($sql);
if ($count > 0) {


    while ($row = mysqli_fetch_assoc($sql)) {

        $rows['success'] = 1;
        $rows['message'] = "User Details";
        $rows['data']['userId'] = $row['id'];
        $rows['data']['user_name'] = $row['name'];
        $rows['data']['user_image'] = $row['profilepic'];
        $rows['data']['coins'] = $row['coins']; // + $row['bonus']
        $rows['data']['email'] = $row['email'];
        $rows['data']['bonus'] = $row['bonus'];
        $rows['data']['points'] = $row['points'];
        $rows['data']['token'] = $token;
        $rows['data']['mobile'] = $row['mobile'];
        $rows['data']['refer'] = $row['refer'];
        $rows['data']['refercode'] = $row['refercode'];
        $rows['data']['firsttime'] = 'NO';
        $rows['data']['dob'] = $row['dob'];
        $rows['data']['otp_verified'] = $row['otp_verified'];
        $rows['data']['winning_amount'] = $row['winning_amount'];
        if ($row['otp_verified'] == 'not_verified') {
            //$otp = rand(1000, 9999);
            //$admin_message = "Your LUDO One Time Password(OTP) is- " . $otp . " Don't share Your OTP to anyone.";
//$admin_message = "Dear user,
//Your Topup Ludo OTP is " . $otp . " use this for signup purpose only and please do not share this OTP with anyone.
//Regards,
//Topup Ludo Team
//Sklite Games Pvt Ltd";
//            $message = urlencode($admin_message);
            $row['otp_status'] = "Not Verified";
            //send_sms($row['mobile'], $message);
        } else {
            $row['otp_status'] = "Verified";
            $otp = NULL;
        }

        $r = "SELECT `gameid` FROM `user_games` WHERE `userid` = '" . $row['id'] . "' order by id desc limit 1";
        $sq = mysqli_query($conn, $r);
        $c = mysqli_num_rows($sq);
        if ($c > 0) {
            $rows['data']['last_game_id'] = mysqli_fetch_assoc($sq)['gameid'];
        } else {
            $rows['data']['last_game_id'] = '';
        }

        $lastlogin = date("Y-m-d H:i:s");
        //echo "update users set lastlogin='" . $lastlogin . "',fcm_token='".$fcm_token."', token='" . $token . "', `otp` = $otp WHERE id='" . $row['id'] . "'";die;
        $insertquery = mysqli_query($conn, "update users set lastlogin='" . $lastlogin . "',fcm_token='" . $fcm_token . "', token='" . $token . "' WHERE id='" . $row['id'] . "'");
        $insertquery;
    }
} else {
    $rows['success'] = 0;
    $rows['message'] = "Credential Not Match";
}

echo (json_encode($rows));
?>