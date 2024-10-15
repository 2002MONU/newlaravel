<?php

include('config.php');
$userid = $_POST['userid'];
$message = $_POST['message'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
$userinfo = mysqli_fetch_assoc($sql);
$name = $userinfo['name'];
$through = 'App';

$mobile = $userinfo['mobile'];
$email = $userinfo['email'];

if (!empty($userid) && !empty($message)) {

    $created_at = time();
    $sqlr = "INSERT INTO `contact_enquiries` (`userid`, `name`, `email`, `mobile`, `message`,`through`, `created_at`) VALUES ('" . $userid . "', '" . $name . "','" . $email . "','" . $mobile . "', '" . $message . "','" . $through . "','" . $created_at . "')";

    $result = mysqli_query($conn, $sqlr);

    $rows['success'] = 1;
    $rows['message'] = "Request Set successfully";
} else {
    $rows['success'] = 0;
    $rows['message'] = "Some error occurred. Please try again.";
}

echo (json_encode($rows));
