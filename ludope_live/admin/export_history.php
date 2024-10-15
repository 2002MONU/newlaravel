<?php

require_once 'config.php';

$where = $date1 = $date2 = $user_search = '';
if ($_GET['date1'] != '' && $_GET['date2'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];

    $diff = abs(strtotime($date2) - strtotime($date1));
    $days_difference = floor($diff / (60 * 60 * 24));

    if ($days_difference > 7) {
        // Date difference is more than 1 day, display an alert
        echo "<script>alert('The difference between the dates should not be more than 7 days.');</script>";
        die;
    } else {
        $where = "WHERE CAST(gtime AS DATE) BETWEEN '$date1' AND '$date2'";
    }
} else if ($_GET['date1'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date1'];
    $where = "WHERE CAST(gtime AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date2'] != '') {
    $date1 = $_GET['date2'];
    $date2 = $_GET['date2'];
    $where = "WHERE CAST(gtime AS DATE) BETWEEN '$date1' AND '$date2'";
}
if ($_GET['user_search'] != '') {
    $user_search = $_GET['user_search'];
    $s = "SELECT GROUP_CONCAT(id,',') from users where name like '%$user_search%' or mobile like '%$user_search%' or email like '%$user_search%'";
    if ($where != '') {
        $where .= " and find_in_set(gamebet.userid, ($s))";
    } else {
        $where .= "WHERE find_in_set(gamebet.userid, ($s))";
    }
}
$status = 'completed';
if ($_GET['status'] != '') {
    $status = $_GET['status'];
}
if ($where != '') {
    $where .= " AND gamebet.status = '" . $status . "'";
} else {
    $where .= "WHERE gamebet.status = '" . $status . "'";
}

$query = "SELECT gamebet.*, GROUP_CONCAT(users.name, '-', users.mobile) AS participants, GROUP_CONCAT(gamebet.amount) AS amounts,
          MAX(CASE WHEN gamebet.userid != 0 AND gamebet.losewin = 'winner' THEN users.name ELSE 'Computer' END) AS result,
          IFNULL(SUM(CASE WHEN gamebet.userid != 0 AND gamebet.losewin = 'winner' THEN gamebet.commission_amount ELSE 0 END), SUM(gamebet.amount)) AS commission,
          IFNULL(SUM(CASE WHEN gamebet.userid != 0 AND gamebet.losewin = 'winner' THEN gamebet.wng_amount ELSE 0 END), 0) AS winning_amount
          FROM gamebet
          LEFT JOIN users ON gamebet.userid = users.id
          $where AND gamebet.userid != 0
          GROUP BY gamebet.gameid
          ORDER BY gamebet.id DESC
          ";

$touserinfo = mysqli_query($conn, $query);

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=' . time() . '_game_history_data' . '.csv');
$output = fopen("php://output", "w");

fputcsv($output, array("Sl No.", "Participants", "Amount", "Date and time", "Table", "Game Id", "Result", "Commission", "Winning amount"));

$i = 1;
while ($user = mysqli_fetch_assoc($touserinfo)) {
    $gid = $user['gameid'];
    if ($user['winning_amount'] == 0) {
        $res = 'Computer';
    } else {
        $res = $user['result'];
    }

    $p = explode(',', $user['participants']);
    $a = explode(',', $user['amounts']);

    $table = $user['tabletype'];
    if ($table == '12') {
        $t = 'Quick - 2 Player';
    } if ($table == '22') {
        $t = 'Quick Private - 2 Player ';
    } if ($table == '14') {
        $t = 'Classic - 4 Player';
    } if ($table == '24') {
        $t = 'Classic Private - 4 Player';
    }

    $row["Sl No."] = $i++;
    $row["Participants"] = implode("\n", $p);
    $row["Amount"] = implode("\n", $a);
    $row["Date and time"] = date("d M Y h:i:s A", strtotime($user['gtime']));
    $row["Table"] = $t;
    $row["Game Id"] = $user['gameid'];
    $row["Result"] = $res;
    $row["Commission"] = $user['commission'];
    $row["Winning amount"] = $user['winning_amount'];

    fputcsv($output, $row);
}

fclose($output);
?>