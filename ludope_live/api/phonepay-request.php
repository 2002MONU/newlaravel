<?php 
require_once 'config.php';

// print_r($_POST);
// die();
$orderId=$_POST['transactionId'];
$status=$_POST['code'];
$txn_id=$_POST['providerReferenceId'];

if($status == 'PAYMENT_SUCCESS'){
    $order_id = $orderId;

        

        $guid = mysqli_query($conn, "SELECT uid,amount FROM payment WHERE orderid='" . $order_id . "'");
        $countd = mysqli_num_rows($guid);
        if ($countd > 0) {
            $gaguid = mysqli_fetch_assoc($guid);
            $userid = $gaguid['uid'];
            $orderamount = $gaguid['amount'];
        }
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");

        while ($row = mysqli_fetch_assoc($sql)) {
            $newcoins = $row['coins'] + $orderamount;
        }
$date=date("Y-m-d H:i:s");
     mysqli_query($conn, "INSERT INTO `bonus` (`user_id`, `date`, `bonus_type`,`bonus`) VALUES ('$userid', '$date','Payment Deposit','$orderamount')");
       
        $insertquery = mysqli_query($conn, "update users set coins='" . $newcoins . "' WHERE id='" . $userid . "'");
        $insertq = mysqli_query($conn, "update payment set status='approved',trnsid='$txn_id' WHERE uid='" . $userid . "' and orderid='" . $order_id . "' ");
        $sqler = mysqli_query($conn, "SELECT * FROM payment WHERE uid='" . $userid . "' and status='Success'");
        /*$count = mysqli_num_rows($sqler);
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
        }*/
        echo "payment success";
}else{
   
    echo "Payment Failed";
}
?>