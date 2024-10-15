<?php
include('config.php');

$pay_details = mysqli_query($conn, "SELECT * FROM payment WHERE trnsid='" . $_POST['txnid'] . "'");
$user_id = mysqli_fetch_assoc($pay_details)['uid'];
$gst_details = mysqli_query($conn, "SELECT * FROM payment WHERE trnsid='" . $_POST['txnid'] . "'");
$bonus = mysqli_fetch_assoc($gst_details)['bonus'];

$user_details1 = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user_id . "'");
$user_coins = mysqli_fetch_assoc($user_details1)['coins'];
$user_details2 = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user_id . "'");
$user_bonus = mysqli_fetch_assoc($user_details2)['bonus'];

$amount = $_POST['amount'] - $bonus;

if ($user_coins > 0) {
    $update_coins = $user_coins + $amount;
} else {
    $update_coins = $amount;
}


if ($user_bonus > 0) {
    $update_bonus = $user_bonus + $bonus;
} else {
    $update_bonus = $bonus;
}


//echo $update_coins . ' ' . $update_bonus;
//die;
sleep(1);
mysqli_query($conn, "update users set coins='$update_coins',bonus='$update_bonus' WHERE id='" . $user_id . "'");

mysqli_query($conn, "update payment set status='" . $_POST['status'] . "',easepayid='" . $_POST['easepayid'] . "',bank_refid='" . $_POST['bank_ref_num'] . "'  WHERE trnsid='" . $_POST['txnid'] . "'");
//mysqli_query($conn, "update users set coins='" . $update_coins . ",'bonus='$update_bonus'  WHERE id='" . $user_id . "'");
header('location:' . $base_url . 'api/payment_success.php');
?>
<html>
    <head>
        <title>Success</title>
    </head>
    <body style="background: #fff; padding-top: 150px">

        <h1 style="">Thanks for your payment - The payment has been successfully completed  <h1/>
    </body>
</html>
