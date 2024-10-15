<?php
include('config.php');

$size = 8;

$refercode = strtoupper(substr(md5(time() . rand(10000, 99999)), 0, $size));

//$refercode =  preg_replace(array('/^\[/','/\]$/'), '',$refercode);

$refercode = str_replace(array('i', 'o'), '', $refercode);




$mobile = $_POST['mobile'];

$email = $_POST['email'];

$name = $_POST['name'];

$Playstore = $_POST['Playstore'];

$password = $_POST['password'];
$fcm_token = $_POST['fcm_token'];
// $profile = $img_path . 'profile.jpg';
$profile = $profile_img_path . 'avatar' . rand(1, 23) . '.png';
//$token = md5(uniqid(rand(), true));
$token = $_POST['fcm_token'];
if ($password != '') {
    $password = $_POST['password'];
} else {
    $password = rand(11111, 99999);
}
$refer_id=0; 
if($_POST['refercode'])
{//echo "SELECT * FROM users WHERE refercode='" . $_POST['refercode'] . "'";die;
$sql3 = mysqli_query($conn, "SELECT * FROM users WHERE refercode='" . $_POST['refercode'] . "' and otp_verified='verified'");

$count3 = mysqli_num_rows($sql3);
if ($count3 > 0) {
  $result3 = mysqli_fetch_array($sql3);  
    $refer_id=$result3[id]; 
}
}


$sql = mysqli_query($conn, "SELECT * FROM users WHERE email='" . $email . "'");

$count = mysqli_num_rows($sql);

$sql1 = mysqli_query($conn, "SELECT * FROM users WHERE mobile='" . $mobile . "'");

$count1 = mysqli_num_rows($sql1);
if ($count > 0 || $count1 > 0) {
    if ($count > 0) {
        $rows['success'] = 0;

        $rows['message'] = "this email already exists";
    }
    if ($count1 > 0) {
        $rows['success'] = 0;

        $rows['message'] = "this mobile already exists";
    }
} else {

    $coins = '0';
$signup_coins = mysqli_fetch_array(mysqli_query($conn, "SELECT signup_amount FROM constants WHERE id='1'"));
$coins=$signup_coins['signup_amount'];
    
$admin_message = "Dear user,
Your Topup Ludo OTP is " . $otp . " use this for signup purpose only and please do not share this OTP with anyone.
Regards,
Topup Ludo Team
Sklite Games Pvt Ltd";
    //$admin_message = "Your LUDO One Time Password(OTP) is- " . $otp . " Don't share Your OTP to anyone.";

    $message = urlencode($admin_message);
    send_sms($mobile, $message);

    $ip_address = $_SERVER['REMOTE_ADDR'];
    $sqlr = "INSERT INTO `users` (`id`, `name`, `tournament`, `pid`,`role`, `coins`, `points`, `bonus`, `email`, `mobile`, `password`, `profilepic`, `token`, `lastlogin`, `refer`, `status`, `registerd`, `refercode`, `otp`,`refer_id`,`ip_address`,`fcm_token`) VALUES (NULL, '" . $name . "', '0', NULL,'0','0', '0', '$coins', '" . $email . "', '" . $mobile . "', '" . $password . "', '" . $profile . "', '" . $token . "', NULL, 'NO', '1', '" . $current_timestamp . "', '" . $refercode . "', '" . $otp . "','".$refer_id."','".$ip_address."','".$fcm_token."')";



    $result = mysqli_query($conn, $sqlr);

    $user_id = mysqli_insert_id($conn);



    $rows['success'] = 1;

    $rows['message'] = "User Details";

    $rows['data']['userId'] = $user_id;

    $rows['data']['user_name'] = $name;

    $rows['data']['user_image'] = $profile;

    $rows['data']['token'] = $token;

    $rows['data']['mobile'] = $mobile;

    $rows['data']['email'] = $email;

    $rows['data']['coins'] = 0;

    $rows['data']['otp'] = $otp;

    $rows['data']['bonus'] = $coins;

    $rows['data']['points'] = '0';

    $rows['data']['refercode'] = $refercode;

    $rows['data']['firsttime'] = 'YES';
    $rows['data']['dob'] = '';
    $rows['data']['winning_amount'] = '0';
}



echo (json_encode($rows));
