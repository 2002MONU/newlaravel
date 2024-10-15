<?php
include('../config.php');
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";
$orderid = $_POST['ORDERID'];
$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

if ($isValidChecksum == "TRUE") {

//    echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
    if ($_POST["STATUS"] == "TXN_SUCCESS") {
//        if (isset($_POST) && count($_POST) > 0) {
//            foreach ($_POST as $paramName => $paramValue) {
//                echo "<br/>" . $paramName . " = " . $paramValue;
//            }
//        }
        $orderid = $_POST['ORDERID'];
        $tx = $_POST['TXNID'];
        $orderamount = $_POST['TXNAMOUNT'];
        $BANKTXNID = $_POST['BANKTXNID'];
        $getde = mysqli_query($conn, "SELECT * FROM payment WHERE orderid='" . $orderid . "'");
        $gorder = mysqli_fetch_assoc($getde);
        $userid = $gorder['uid'];
        $st = 'Success';
        $insertquery = mysqli_query($conn, "update payment set status='" . $st . "', amount='" . $orderamount . "', trnsid='" . $tx . "', BANKTXNID='" . $BANKTXNID . "' WHERE orderid='" . $orderid . "'");
        $insertquery;
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
        while ($row = mysqli_fetch_assoc($sql)) {
            $newcoins = $row['coins'] + $orderamount;
            $mobile = $row['mobile'];
            $emailid = $row['emailid'];
        }

        $insertquery1 = mysqli_query($conn, "update users set coins='" . $newcoins . "' WHERE id='" . $userid . "'");
        $insertquery1;
        $admin_message = "Your payment " . $orderamount . " was successful, with order number " . $orderid . " ";
        $admin_msg = urlencode($admin_message);
        if ($mobile != '') {
            send_sms($mobile, $admin_msg, 1407161959762462315);
        }
//        echo "<b>Transaction status is success</b>" . "<br/>";
        //Process your transaction here as success transaction.
        //Verify amount & order id received from Payment gateway with your application's order id and amount.
        ?>
        <form method="post" name="redirect" action="../success.php">
        </form>
        <script language='javascript'>document.redirect.submit();</script>
        <?php
    } else {
        $insertquery = mysqli_query($conn, "update payment set status='Failed' WHERE orderid='" . $orderid . "'");
        $insertquery;
//        echo "<b>Transaction status is failure</b>" . "<br/>";
        ?>
        <form method="post" name="redirect_failed" action="../failed.php">
        </form>
        <script language='javascript'>document.redirect_failed.submit();</script>
        <?php
    }
} else {
    $insertquery = mysqli_query($conn, "update payment set status='Failed' WHERE orderid='" . $orderid . "'");
    $insertquery;
//    echo "<b>Checksum mismatched.</b>";
    ?>
    <form method="post" name="redirect_failed" action="../failed.php">
    </form>
    <script language='javascript'>document.redirect_failed.submit();</script>
    <?php
    //Process transaction as suspicious.
}
?>