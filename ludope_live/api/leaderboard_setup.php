<?php

include('config.php');

$type = $_POST['type'];
if ($type == 0) {
    $from_date = date("Y-m-d 00:00:00", strtotime("This week monday"));
    $to_date = date("Y-m-d 23:59:59", strtotime("This week sunday"));
} else {
    $from_date = date("Y-m-01 00:00:00");
    $to_date = date("Y-m-d 23:59:59", strtotime("last day of this month"));
}
$sql = mysqli_query($conn, "SELECT userid, SUM(wng_amount) AS total_coins FROM gamebet WHERE gamecomplete >= '" . $from_date . "' AND gamecomplete <= '" . $to_date . "' AND user_type = 'real_user' GROUP BY userid ORDER BY total_coins DESC");

//print_r("SELECT *, SUM(amount) AS total_coins FROM gamebet GROUP BY userid ORDER BY total_coins DESC;");
//die;
//SELECT *, SUM(wng_amount) AS total_coins FROM gamebet WHERE gamecomplete >= '2023-02-05 00:00:00' AND gamecomplete <= '2024-02-11 23:59:59' AND user_type = 'real_user' AND type ='".$type."' GROUP BY userid ORDER BY total_coins DESC;
//print_r("SELECT *, SUM(wng_amount) AS total_coins FROM gamebet WHERE gamecomplete >= '" . $from_date . "' AND gamecomplete <= '" . $to_date . "' AND user_type = 'real_user' GROUP BY userid ORDER BY total_coins DESC");
//die;


$i = 0;
if (mysqli_num_rows($sql) > 0) {
    while ($rownew = mysqli_fetch_assoc($sql)) {
        $rows['success'] = 1;
        $rows['message'] = "Success";
        $rows['data'][$i] = $rownew;
        $i++;
    }
} else {
    $rows['success'] = 0;
    $rows['message'] = "No data";
}
echo (json_encode($rows));
?>