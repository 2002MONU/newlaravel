<?php

require_once 'config.php';

$where = $date1 = $date2 = $user_search = '';
if ($_GET['date1'] != '' && $_GET['date2'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];

    // Calculate the difference between dates
    $diff = abs(strtotime($date2) - strtotime($date1));
    $days_difference = floor($diff / (60 * 60 * 24));

    if ($days_difference > 1) {
        // Date difference is more than 1 day, display an alert
        echo "<script>alert('The difference between the dates should not be more than 1 day.');</script>";
        die;
    } else {

        $where = "AND CAST(registerd AS DATE) BETWEEN '$date1' AND '$date2'";
    }
} else if ($_GET['date1'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date1'];
    $where = "AND CAST(registerd AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date2'] != '') {
    $date1 = $_GET['date2'];
    $date2 = $_GET['date2'];
    $where = "AND CAST(registerd AS DATE) BETWEEN '$date1' AND '$date2'";
}
if ($_GET['user_search'] != '') {
    $user_search = $_GET['user_search'];
    $where .= " and (name like '%$user_search%' or mobile like '%$user_search%' or email like '%$user_search%')";
}

$sqlnew = mysqli_query($conn, "SELECT * FROM users WHERE id!=1 and otp_verified='verified' $where ORDER BY id DESC");

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=' . time() . '_users_data' . '.csv');
$output = fopen("php://output", "w");

fputcsv($output, array("Sl No.", "User Name", "Email", "Phone Number", "Real Cash", "Bonus", "Winning", "Last Login", "Registerd", "Status", "Kyc status"));

$i = 1;
while ($user = mysqli_fetch_assoc($sqlnew)) {
    $sqlnew8 = mysqli_query($conn, "SELECT user_id,status FROM kyc WHERE user_id = '" . $user['id'] . "'");
    $kyc_status = mysqli_fetch_assoc($sqlnew8);
    $row["Sl No."] = $i++;
    $row["User Name"] = $user['name'];
    $row["Email"] = $user['email'];
    $row["Phone Number"] = $user['mobile'];
    $row["Real Cash"] = $user['coins'];
    $row["Bonus"] = $user['bonus'];
    $row["Winning"] = $user['winning_amount'];
    $row["Last Login"] = ($user['lastlogin'] != '') ? date('d M Y h:i A', strtotime($user['lastlogin'])) : date('d M Y h:i A', strtotime($user['registerd']));
    $row["Registerd"] = date('d M Y h:i A', strtotime($user['registerd']));
    $row["Status"] = ($user['status'] == '1') ? 'Enabled' : 'Disabled';
    $row['Kyc status'] = !empty($kyc_status['status']) ? $kyc_status['status'] : 'User not uploaded';
    fputcsv($output, $row);
}

fclose($output);
?>