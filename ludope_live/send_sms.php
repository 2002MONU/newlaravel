<?php

require_once 'api/config.php';
$mobile = $_POST['mobile'];
//$admin_message = "Interested to play LUDO? Want to make some cash ?? Try out LudoC app. http://charitygamez.com/ludoc.apk";
$admin_message = "Download our LudoC app. http://charitygamez.com/ludoc.apk";


$message = urlencode($admin_message);
send_sms($mobile, $message, 1407162064496893047);

echo "<script> document.location.href='index.php?msg=sms';</script>";
?>