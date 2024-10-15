<?php

require_once 'config.php';
$month_start = date('Y-m-01 00:00:01');
$month_end = date('Y-m-t 23:59:59');
$today_start = date('Y-m-d 00:00:01');
$today_end = date('Y-m-d 23:59:59');

$i = 1;

$where = $date1 = $date2 = $user_search = '';
if ($_GET['date1'] != '' && $_GET['date2'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];
     $diff = abs(strtotime($date2) - strtotime($date1));
    $days_difference = floor($diff / (60 * 60 * 24));

    if ($days_difference > 7) {
        // Date difference is more than 1 day, display an alert
        echo "<script>alert('The difference between the dates should not be more than 7 days.');
         window.location.href='transactions.php';</script>";
        die;
    } else {
        $where = "AND CAST(payment.datetime AS DATE) BETWEEN '$date1' AND '$date2'";
    }
    
} else if ($_GET['date1'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date1'];
    $where = "AND CAST(payment.datetime AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date2'] != '') {
    $date1 = $_GET['date2'];
    $date2 = $_GET['date2'];
    $where = "AND CAST(payment.datetime AS DATE) BETWEEN '$date1' AND '$date2'";
}
if ($_GET['user_search'] != '') {
    $user_search = $_GET['user_search'];
    $sql_no = mysqli_query($conn, "select * from users where mobile='" . $user_search . "'");
    $user = mysqli_fetch_array($sql_no);
    $where .= " and (uid='" . $user['id'] . "')";
}
if ($_GET['user_status'] != '') {
    $user_status = $_GET['user_status'];
    $where .= " and (status='$user_status')";
}

$title = "payout_report";
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=' . $title . '.csv');
$output = fopen("php://output", "w");
fputcsv($output, array("Sl No.", "User", "Order Id", "Amount", "Payment Date", "Withdrawal Into", "Bank Details", "Status"));

$touserinfo = mysqli_query($conn, "select * from payment where trnstype='deposit' $where order by pid DESC");

while ($user = mysqli_fetch_assoc($touserinfo)) {
    $userid = $user['uid'];
    $pid = $user['pid'];
    $uinfo = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
    $userinfo = mysqli_fetch_assoc($uinfo);
    $bankinfo = mysqli_query($conn, "SELECT * FROM kyc WHERE user_id='" . $userid . "'");
    $binfo = mysqli_fetch_assoc($bankinfo);
    $date = $user['datetime'];
    $timestamp = strtotime($date);
    $slot_key = date("d M Y h:i:s A", $timestamp);
    if ($user['getway'] == 'bank') {
        $bankdetails = $binfo['name'] . "\r\n" . $binfo['bankname'] . "\r\n" . $binfo['account'] . "\r\n" . $binfo['ifsc'] . "\r\n" . $binfo['panno'];
    } else {
        $bankdetails = $binfo['upi_name'] . "\r\n" . $binfo['upi_id'];
    }
    $row["Sl No."] = $i++;
    $row["User"] = $userinfo['name'] . '-' . $userinfo['mobile'];
    $row["Order Id"] = $user['orderid'];
    $row["Amount"] = $user['amount'];
    $row["Request Date"] = $slot_key;
    $row["Withdrawal Into"] = $user['getway'];
    $row["Bank Details"] = $bankdetails;
    $row["Status"] = $user['status'];
    fputcsv($output, $row);
}
fclose($output);
?>
