<?php

include('config.php');
$user_id = $_POST['user_id'];
$token = $_POST['token'];
/* $insertquery =mysqli_query($conn,"update users set refercode='".$user_id."', token='".$token."' WHERE id='1'");
  $insertquery; */
$sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user_id . "' and status = 1");
//$sql=mysqli_query($conn, "SELECT * FROM users WHERE id='".$user_id."' AND token='".$token."'");
$count = mysqli_num_rows($sql);
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($sql)) {
        $rows['success'] = 1;
        $rows['coins'] = $row['coins']; //+ $row['bonus']
        $rows['bonus'] = $row['bonus'];
        $rows['points'] = $row['points'];
        $rows['winning_amount'] = $row['winning_amount'];
        $rows['total_wallet_balance'] = $row['coins'] + $row['bonus'] + $row['winning_amount'];
    }
} else {
    $rows['success'] = 0;
    $rows['message'] = "Token or user id not matched.";
}

echo (json_encode($rows));
?>