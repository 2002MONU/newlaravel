<?php
require_once 'header.php';
$uinfo = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $uid . "'");
$uinfos = mysqli_fetch_assoc($uinfo);
$rcode = $uinfos['refercode'];

if ($uid == '1') {
    $sql = mysqli_query($conn, "SELECT * FROM users");
    $sqllist = mysqli_query($conn, "SELECT * FROM users");
} else {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE pid='" . $uid . "' OR refer='" . $rcode . "'");
    $sqllist = mysqli_query($conn, "SELECT * FROM users");
}



$orderid = $_GET['orderid'];
$userid = $_GET['userid'];
$status = $_GET['status'];
$amount = $_GET['amount'];
$transactionid= $_GET['transactionid'];
$pid = $_GET['pid'];
if ($status == 'approved') {

    $sqlr = "UPDATE `payment` SET status = '$status',trnsid='$transactionid' where orderid='$orderid' and uid='$userid' ";

    if (mysqli_query($conn, $sqlr)) {
        echo "Updated Successfully...";
    }
    ?>
    <form method="post" name="redirect" action="withdraw.php">

    </form>
    </center>
    <script language='javascript'>document.redirect.submit();</script>


    <?php
}

if ($status == 'Declined') {
    $reason = $_GET['reason'];
    $sqlr = "UPDATE `payment` SET status = '$status', decline_reason = '$reason' where orderid='$orderid' and uid='$userid' ";
    if (mysqli_query($conn, $sqlr)) {
        echo "Updated Successfully...";

        $sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
        $row = mysqli_fetch_assoc($sql);
        $coins = $row['coins'];
        $winning_amount = $row['winning_amount'];
        $newcoins = $coins + $amount;
        $newwinning_amount = $winning_amount + $amount;
//        coins='" . $newcoins . "',
        $insertquery = mysqli_query($conn, "update users set winning_amount='" . $newwinning_amount . "' WHERE id='" . $userid . "'");
        $insertquery;


        $mobile = $row['mobile'];
        $admin_message = "Your withdrawal request has been declined order number " . $order_id . " and amount " . $amount . " has been return into HYIKE Balance. Reason: " . $reason;
        $admin_msg = urlencode($admin_message);
        send_sms($mobile, $admin_msg);
        ?>
        <form method="post" name="redirect" action="withdraw.php">

        </form>
        </center>
        <script language='javascript'>document.redirect.submit();</script>


        <?php
    }
}


if ($status == 'Remove') {

    $sqlr = "DELETE FROM payment where orderid='$orderid' and uid='$userid'";

    if (mysqli_query($conn, $sqlr)) {
        echo "Deleted Successfully...";
    }
    ?>
    <form method="post" name="redirect" action="withdraw.php">

    </form>
    </center>
    <script language='javascript'>document.redirect.submit();</script>


    <?php
}
?>