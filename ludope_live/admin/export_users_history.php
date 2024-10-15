<?php

require_once 'config.php';


$where = $date1 = $date2 = $user_search = '';
if ($_GET['date1'] != '' && $_GET['date2'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];
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
if ($_GET['user_search'] != '') {
    $user_search = $_GET['user_search'];
    $where .= " and (users.name like '%$user_search%' or users.mobile like '%$user_search%' or users.email like '%$user_search%')";
}

//if ($_GET['order'] != '') {
//    $order = $_GET['order'];
//} else {
//    $order = 'games_played_desc';
//}
//if ($order == 'games_played_desc') {
//    $order_by = "ORDER BY total_games DESC";
//}
//if ($order == 'games_played_asc') {
//    $order_by = "ORDER BY total_games ASC";
//}
//if ($order == 'winning_amount_desc') {
//    $order_by = "ORDER BY total_winning DESC";
//}
//if ($order == 'winning_amount_asc') {
//    $order_by = "ORDER BY total_winning ASC";
//}
//if ($order == 'withdraw_amount_desc') {
//    $order_by = "ORDER BY total_withdrawal DESC";
//}
//if ($order == 'withdraw_amount_asc') {
//    $order_by = "ORDER BY total_withdrawal ASC";
//}
//if ($order == 'deposited_amount_desc') {
//    $order_by = "ORDER BY total_desposite DESC";
//}
//if ($order == 'deposited_amount_asc') {
//    $order_by = "ORDER BY total_desposite ASC";
//}
//$sql = "SELECT COALESCE(g.total_games,0) as total_games,COALESCE(gw.total_winning,0) as total_winning,COALESCE(wd.total_withdrawal,0) as total_withdrawal,COALESCE(d.total_desposite,0) as total_desposite, users.* FROM users LEFT JOIN (SELECT userid, COUNT(id) as total_games from gamebet where status = 'completed' GROUP BY gamebet.userid) g on g.userid = users.id LEFT JOIN (SELECT userid,SUM(wng_amount) as total_winning from gamebet where losewin = 'winner') gw on gw.userid = users.id LEFT JOIN (SELECT uid,SUM(amount) as total_withdrawal from payment where trnstype = 'withdrawal') wd on wd.uid = users.id LEFT JOIN (SELECT uid,SUM(amount) as total_desposite from payment where trnstype = 'desposite') d on d.uid = users.id WHERE users.id!=1 $where $order_by";
//$sqlnew = mysqli_query($conn, $sql);
$sqlnew = mysqli_query($conn, "SELECT * FROM users WHERE id!=1 $where ORDER BY id DESC");

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=' . time() . '_users_history_data' . '.csv');
$output = fopen("php://output", "w");

fputcsv($output, array("Sl No.", "User Name", "Email", "Phone Number", "Total Deposited Amount", "Total Withdraw Amount", "Total Winning Amount", "Total Games Played", "Registerd", "Status"));

$i = 1;
while ($user = mysqli_fetch_assoc($sqlnew)) {
    $s = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) as total from payment where uid = '" . $user['id'] . "' AND trnstype = 'desposite' and status = 'Success'");
    $total_desposite = mysqli_fetch_assoc($s)['total'];

    $s = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) as total from payment where uid = '" . $user['id'] . "' AND trnstype = 'withdrawal'");
    $total_withdrawal = mysqli_fetch_assoc($s)['total'];

    $s = mysqli_query($conn, "SELECT COALESCE(SUM(wng_amount),0) as total from gamebet where userid = '" . $user['id'] . "' AND losewin = 'winner'");
    $total_winning = mysqli_fetch_assoc($s)['total'];

    $s = mysqli_query($conn, "SELECT COALESCE(COUNT(id),0) as total from gamebet where userid = '" . $user['id'] . "' AND status = 'completed' ");
    $total_games = mysqli_fetch_assoc($s)['total'];

    $row["Sl No."] = $i++;
    $row["User Name"] = $user['name'];
    $row["Email"] = $user['email'];
    $row["Phone Number"] = $user['mobile'];
    $row["Total Deposited Amount"] = $total_desposite;
    $row["Total Withdraw Amount"] = $total_withdrawal;
    $row["Total Winning Amount"] = $total_winning;
    $row["Total Games Played"] = $total_games;
    $row["Registerd"] = date('d M Y h:i A', strtotime($user['registerd']));
    $row["Status"] = ($user['status'] == '1') ? 'Enabled' : 'Disabled';

    fputcsv($output, $row);
}

fclose($output);
?>