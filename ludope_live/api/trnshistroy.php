<?php

include('config.php');

$user_id = $_POST['user_id'];

$sql = mysqli_query($conn, "SELECT * FROM payment WHERE uid='" . $user_id . "' order by pid DESC");
$count = mysqli_num_rows($sql);
if ($count > 0) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($sql)) {
        if ($row['trnstype'] == 'deposit') {
            $row['deposit'] = $row['amount'] - $row['bonus'];
            $row['total'] = $row['deposit'] + $row['bonus'];
            $row['gst'] = round($row['gst']);
            $row['bonus'] = round($row['bonus']);
        } else {
            $row['deposit'] = $row['amount'];
            $row['total'] = $row['deposit'];
            $row['gst'] = 'NA';
            $row['bonus'] = 0;
        }
        if ($row['status'] == 'In process' || $row['status'] == 'pending') {
            $row['status'] = 'Failed';
        } else {
            $row['status'] = 'Success';
        }
        unset($row['amount']);
        unset($row['orderid']);
        $rows['success'] = 1;
        $rows['message'] = "Transactions History successfully";
        $rows['data'][$i] = $row;
        $i++;
    }
} else {
    $rows['success'] = 0;
    $rows['message'] = "No Records";
}

echo (json_encode($rows));
?>