<?php

include('config.php');

$user_id = $_POST['user_id'];
$fcm_token = $_POST['fcm_token'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user_id . "'");
$count = mysqli_num_rows($sql);
if ($count > 0) {
//echo $count;die;

    while ($row = mysqli_fetch_assoc($sql)) {

        
        $lastlogin = date("Y-m-d H:i:s");
        $insertquery = mysqli_query($conn, "update users set lastlogin='" . $lastlogin . "',fcm_token='".$fcm_token."', token='" . $fcm_token . "' WHERE id='" . $row['id'] . "'");
        $rows['success'] = 1;
    $rows['message'] = "Updated Successfully";
    }
} else {
    $rows['success'] = 0;
    $rows['message'] = "Invalid User Id";
}

echo (json_encode($rows));
?>