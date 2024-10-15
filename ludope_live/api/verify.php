<?php
require('config.php');

session_start();

require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false) {
    $api = new Api($keyId, $keySecret);

    try {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    } catch (SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true) {
//    print_r($_POST);
//    die;
    $html['success'] = 1;
    $html['message'] = "Your payment was successful";
    $order_id = $_POST['shopping_order_id'];
    $userid = $_POST['userid'];
    $orderamount = $_POST['orderamount'];
    $mobile = $_POST['mobile'];
    $emailid = $_POST['emailid'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");

    while ($row = mysqli_fetch_assoc($sql)) {

        $newcoins = $row['coins'] + $orderamount;
    }
    $insertquery = mysqli_query($conn, "update users set coins='" . $newcoins . "' WHERE id='" . $userid . "'");


    $insertq = mysqli_query($conn, "update payment set status='Success' WHERE uid='" . $userid . "' and orderid='" . $order_id . "' ");

    $sqler = mysqli_query($conn, "SELECT * FROM payment WHERE uid='" . $userid . "' and status='Success'");
    $count = mysqli_num_rows($sqler);
    if ($count > 0) {


        $sqls = mysqli_query($conn, "SELECT * FROM refered WHERE uid='" . $userid . "' and status='1'");
        $countss = mysqli_num_rows($sqls);
        if ($countss > 0) {


            $insert = mysqli_query($conn, "update refered set status='2' WHERE uid='" . $userid . "'");
            $gatrcode = mysqli_fetch_assoc($sqls);
            $refercode = $gatrcode['rcode'];

            $gtrc = mysqli_query($conn, "SELECT * FROM users WHERE refercode='" . $refercode . "'");


            $rowss = mysqli_fetch_assoc($gtrc);
            $bonus = $rowss['bonus'] + 50;
            $insertquery = mysqli_query($conn, "update users set bonus='" . $bonus . "' WHERE refercode='" . $refercode . "'");




            $usersql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
            $rowuser = mysqli_fetch_assoc($usersql);
            $bonusu = $rowuser['bonus'] + 100;

            $insert = mysqli_query($conn, "update users set bonus='" . $bonusu . "', refer='" . $refercode . "' WHERE id='" . $userid . "'");
        }
    }



    // $html = "<p>Your payment was successful</p><p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
    // print_r($_POST);


    $admin_message = "Your payment " . $orderamount . " was successful, with order number " . $_POST['razorpay_payment_id'] . " ";
    $admin_msg = urlencode($admin_message);
    //send_sms($mobile, $admin_msg);
    ?>




    <form method="post" name="redirect" action="success.php">

    </form>
    </center>
    <script language='javascript'>document.redirect.submit();</script>
    <?php
} else {

    $html['success'] = 0;
    $html['message'] = $error;
    ?>

    <form method="post" name="redirect" action="failed.php">

    </form>
    </center>
    <script language='javascript'>document.redirect.submit();</script>
    <?php
    //  $html = "<p>Your payment failed</p><p>{$error}</p>";
}

//echo $html;

$json = json_encode($html);
?>