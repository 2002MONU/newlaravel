<?php

include('config.php');

$userid = $_REQUEST['uid'];
$profilepic = $_REQUEST['profilepic'];
//$rows['message1'] = $_REQUEST['profilepic'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
$count = mysqli_num_rows($sql);
if ($count > 0) {


    $insertquery = mysqli_query($conn, "update users set profilepic='$profilepic' WHERE id='" . $userid . "'");
    $insertquery;

    $rows['success'] = 1;
    $rows['message'] = "Profile Pic has been changed successfully.";
} else {

    $rows['success'] = 0;
    $rows['message'] = "Something went wrong please try again later.";
}

echo (json_encode($rows));
?>
