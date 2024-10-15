<?php

//$mobile = $_POST['mobile'];
//$admin_message = $_POST['msg'];
//
//$admin_msg = urlencode($admin_message);
//
//function send_sms($mobile, $admin_msg, $template_id = '') {
//    //return false;
//    //$message = urlencode($admin_msg);
//    $message = $admin_msg;
//    $URL = "http://login.smsmoon.com/API/sms.php"; // connecting url
//    $post_fields = ['username' => "LUDOC", 'password' => "vizag@123", 'from' => "CHARTY", 'to' => $mobile, 'msg' => $message, 'type' => 1, 'dnd_check' => 0, "template_id" => $template_id];
//
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $URL);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
//    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    curl_exec($ch);
//    return true;
//}


$mobile = $_POST['mobile'];
$admin_message = $_POST['msg'];

$admin_msg = urlencode($admin_message);

function send_sms($mobile, $admin_msg) {
    //return false;
    //$message = urlencode($admin_msg);
    $message = $admin_msg;
    $URL = 'https://2factor.in/API/R1/?module=TRANS_SMS&apikey=42eb516a-23eb-11ee-addf-0200cd936042&to="' . $mobile . '"&from=LUDOPE&msg="' . $message . '"'; // connecting url
//    $post_fields = [
//        'module' => "TRANS_SMS",
//        'apikey' => '42eb516a-23eb-11ee-addf-0200cd936042',
//        'to' => $mobile,
//        'from' => 'LUDOPE',
//        'msg' => $message,
//    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);

    return true;
}

//send_sms($mobile, $admin_msg, $template_id);
?>