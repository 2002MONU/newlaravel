<?php

include('config.php');
$user_id = $_REQUEST['user_id'];
$otp = $_REQUEST['old_password'];
$password = $_REQUEST['password'];

$sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user_id . "' and password='".$otp."'");
$count = mysqli_num_rows($sql);
if ($count > 0 && $password!='') {

    while ($row = mysqli_fetch_assoc($sql)) {

            $insertquery = mysqli_query($conn, "update users set password='" . $password . "' WHERE id='" . $user_id . "'");
       
            $rows['success'] = 1;
        $rows['message'] = "Password has been Updated Successfully";
       }
} else {
    $rows['success'] = 0;
    $rows['message'] = "Wrong details, Please Try Again!";
}

echo (json_encode($rows));
?>