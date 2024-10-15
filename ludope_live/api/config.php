<?php

//error_reporting(0);

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

$otp = 12345; //change here to make dynamic all over the project
//$otp = rand(999,9999);
// Create connection


$conn = mysqli_connect($servername, $username, $password, $database);
$conn->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
$app_name = "charitygamez";
$current_timestamp = date('Y-m-d H:i:s');

$base_url = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

$base_url = str_replace("api/", "", $base_url);
//echo $base_url;die;


$api_url = $base_url . "/api/";

$domain_name = $base_url;
$apk_url = $base_url . "LudoPE.apk";
$logo_url = $base_url . "assets/img/logo.png";
$img_path = $base_url . "img/";
$profile_img_path = $base_url . "img/profiles/";

$no_reply_email = 'info@thecolourmoon.com';
$from_email = 'info@thecolourmoon.com';

$cofingmode = 'TEST';
if ($cofingmode == "TEST") {
    $appId = '81211f4ef29e474e75e186c9511218';
    $secretKey = 'ef322cadae079244aaea703e91cbacc7bcf66a4b';
} else {
    //Live keys
    $appId = '127997b962a4f87efe8fea5542799721';
    $secretKey = '975c7a6205ef4cef0a7135a92fa2b941efa18ae3';
}


if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
} else {
//echo "connected";
}

$url = $_SERVER['REQUEST_URI'];
//$sqlr = "INSERT INTO `history` (`url`,`created_at`) VALUES ('" . $url . "','" . date('d-m-Y h:i:s') . "')";
//$result = mysqli_query($conn, $sqlr);
$constants_sql = mysqli_query($conn, "SELECT * FROM constants WHERE id='1'");
$constants = mysqli_fetch_assoc($constants_sql);

$apk_version = $constants["current_version"];

function send_sms($mobile, $admin_msg, $template_id = '') {
    //return false;
    //$message = urlencode($admin_msg);
    $message = $admin_msg;
    //$URL = "https://www.mysmsapp.in/api/push.json"; // connecting url
    //$post_fields = ['apikey' => "64d6035ed9a7a", 'sender' => "SKLITE", 'mobileno' => $mobile, 'text' => $message];
    //$url="https://www.mysmsapp.in/api/push.json?apikey=64d6035ed9a7a&sender=SKLITE&mobileno=".$mobile."&text=".$message;
    //$ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, $url);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_exec($ch);
    return true;
}

?>