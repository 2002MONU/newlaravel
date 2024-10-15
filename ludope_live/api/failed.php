
<?php
include('config.php');
mysqli_query($conn, "update payment set status='failed'  WHERE trnsid='" . $_POST['txnid'] . "'");

//$pay_details = mysqli_query($conn, "SELECT * FROM payment WHERE trnsid='" . $_POST['txnid'] . "'");
//$user_id = mysqli_fetch_assoc($pay_details)['uid'];
//$gst_details = mysqli_query($conn, "SELECT * FROM payment WHERE trnsid='" . $_POST['txnid'] . "'");
//$bonus = mysqli_fetch_assoc($gst_details)['gst'];
//
//$user_details1 = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user_id . "'");
//$user_coins = mysqli_fetch_assoc($user_details1)['coins'];
//$user_details2 = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user_id . "'");
//$user_bonus = mysqli_fetch_assoc($user_details2)['bonus'];
//if ($user_coins > 0) {
//    $update_coins = $user_coins + $_POST['amount'];
//} else {
//    $update_coins = $_POST['amount'];
//}
//
//
//if ($user_bonus > 0) {
//    $update_bonus = $user_bonus + $bonus;
//} else {
//    $update_bonus = $bonus;
//}
?>
<h1 style="color: red">Sorry , Something went wrong please try again after some time </h1>