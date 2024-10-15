<?php

include('config.php');

$user_id = $_POST['user_id'];
$mobile = $_POST['mobile'];
//$otp = rand(1000, 9999);

$sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user_id . "' AND mobile = '$mobile'");
$count = mysqli_num_rows($sql);
if ($count == 0) {
//    $sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user_id . "'");
//
//    $data = mysqli_fetch_assoc($sql);
//    $count = mysqli_num_rows($sql);
//    if ($count > 0) {
    $sql = mysqli_query($conn, "UPDATE users set `otp` = $otp, mobile = '$mobile' WHERE id='" . $user_id . "'");

    $admin_message = "Your LUDO One Time Password(OTP) is- " . $otp . " Don't share Your OTP to anyone.";

    $message = urlencode($admin_message);
    send_sms($mobile, $message, 1407161959770518712);

    $rows['success'] = 1;

    $rows['message'] = "Mobile number updated";
//    } else {
//        $rows['success'] = 0;
//
//        $rows['message'] = "Failed";
//    }
} else {
    $rows['success'] = 0;

    $rows['message'] = "Mobile Number Already exist";
}
echo (json_encode($rows));
?>