<?php

ob_start();
session_start();

error_reporting(0);

date_default_timezone_set('Asia/Kolkata');

$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");

$base_url .= "://" . $_SERVER['HTTP_HOST'];

$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if (strpos($base_url, "ready2host.in")) {
    $env = "prod"; // dev or prod
} else {
    $env = "dev"; // dev or prod
}

if ($env != "dev") {
    $servername = "localhost";
    $username = "manicmoon";
    $password = "Vizag@4532";
    $database = "ludope_dev";
} else {

    $servername = "localhost";
    $username = "manicmoon";
    $password = "Vizag@4532";
    $database = "ludope_live";
}


// Create connection


$conn = mysqli_connect($servername, $username, $password, $database);
$conn->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
$app_name = "Ludope";

$admin_base_url = $base_url . "admin/";
$base_url = $base_url . "";
$api_url = $base_url . "api/";
$domain_name = "demo.colormoon.in";
$apk_url = $base_url . "cm-ludo.apk";
$logo_url = $base_url . "img/logo.png";
$img_path = $base_url . "img/";
$apk_version = 9;
$logo = $base_url . 'img/logo.png';
$logo2 = $base_url . 'img/logo-2.png';
$no_reply_email = 'info@thecolourmoon.com';
$from_email = 'info@thecolourmoon.com';
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
} else {
//echo "connected";
}

$displayCurrency = 'INR';

$cofingmode = "TEST";

//function send_sms($mobile, $admin_msg) {
//    $URL = "http://login.smsmoon.com/API/sms.php"; // connecting url
//    $post_fields = ['username' => 'crazyludo', 'password' => 'vizag@123', 'from' => 'INFOSM', 'to' => $mobile, 'msg' => $admin_msg, 'type' => 1, 'dnd_check' => 0];
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $URL);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    $result = curl_exec($ch);
//}

function send_sms($mobile, $admin_msg, $template_id = '') {

    //return false;
    // $message = urlencode($admin_msg);
    $message = $admin_msg;

    $URL = "http://login.smsmoon.com/API/sms.php"; // connecting url
    $post_fields = ['username' => "LUDOC1", 'password' => "vizag@123", 'from' => "CHARTY", 'to' => $mobile, 'msg' => $message, 'type' => 1, 'dnd_check       ' => 0, "template_id" => $template_id];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    return true;
}

?>