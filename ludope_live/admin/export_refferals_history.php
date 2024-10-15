<?php
require_once 'config.php';
$month_start = date('Y-m-01 00:00:01');
$month_end = date('Y-m-t 23:59:59');
$today_start = date('Y-m-d 00:00:01');
$today_end = date('Y-m-d 23:59:59');

//print_r('ugiugi');die;
$where = $date1 = $date2 = $user_search = '';
if ($_GET['date1'] != '' && $_GET['date2'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];
    $diff = abs(strtotime($date2) - strtotime($date1));
    $days_difference = floor($diff / (60 * 60 * 24));

    if ($days_difference > 7) {
        // Date difference is more than 1 day, display an alert
        echo "<script>alert('The difference between the dates should not be more than 7 days.');
         window.location.href='referrals.php';</script>";
        die;
    } else {
        $where = "WHERE CAST(gtime AS DATE) BETWEEN '$date1' AND '$date2'";
    }
    $where = "AND CAST(users.registerd AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date1'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date1'];
    $where = "AND CAST(users.registerd AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date2'] != '') {
    $date1 = $_GET['date2'];
    $date2 = $_GET['date2'];
    $where = "AND CAST(users.registerd AS DATE) BETWEEN '$date1' AND '$date2'";
}
if ($_GET['id'] != '') {
    $user_search = $_GET['id'];
    $sql_no = mysqli_query($conn, "select * from users where WHERE id='" . $user['refer_id'] . "'");
    $user = mysqli_fetch_array($sql_no);
    $where .= " and (uid='" . $user['id'] . "')";
}
if ($_GET['user_status'] != '') {
    $user_status = $_GET['user_status'];
    $where .= " and (status='$user_status')";
}

//$title = "refferal_report";
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='. time() . 'refferal_report' . '.csv');

$output = fopen("php://output", "w");

fputcsv($output, array("Sl No.", " Name", "Mobile", "Referral amount", "Email", "Registered","Referral","Referee amount"));

$touserinfo = mysqli_query($conn, "select * from users where refer='YES' $where order by id DESC");

while ($user = mysqli_fetch_assoc($touserinfo)) {
    $userid = $user['id'];
     $uinfo = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
    $userinfo = mysqli_fetch_assoc($uinfo);
    // print_r($userinfo);die;
     $det = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user['refer_id'] . "'"));
     $referrer = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM refered WHERE uid='" . $user['id'] . "'"));
    // print_r($referrer);die;
    $date = $user['registerd'];
    $timestamp = strtotime($date);
    $slot_key = date("d M Y h:i:s A", $timestamp);
//    if ($user['getway'] == 'bank') {
//        $bankdetails = $binfo['name'] . "\r\n" . $binfo['bankname'] . "\r\n" . $binfo['account'] . "\r\n" . $binfo['ifsc'] . "\r\n" . $binfo['panno'];
//    } else {
//        $bankdetails = $binfo['upi_name'] . "\r\n" . $binfo['upi_id'];
//    }
    $row["Sl No."] = $i++;
    $row["User"] = $userinfo['name'];
    $row["Mobile"] = $userinfo['mobile'];
    $row["Referral amount"] = $referrer['referee_amount'];
    $row["Email"] = $userinfo['email'];
    $row["Registered Date "] = $userinfo['registerd'];
    $row["Referral"] = $det['mobile'];
    $row["Referee amount"] = $referrer['referrer_amount'];
  // $row["Status"] = $user['status'];
    fputcsv($output, $row);
}
fclose($output);



?>
