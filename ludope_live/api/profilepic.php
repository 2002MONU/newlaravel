<?php

include("config.php");

$user_id = $_POST['user_id'];
$img = $_POST['img'];


if (!empty($user_id)) {

//    define('UPLOAD_DIR', 'uploads/');
//
//    $img = str_replace('data:image/png;base64,', '', $img);
//    $img = str_replace(' ', '+', $img);
//    $data = base64_decode($img);
//    $file = UPLOAD_DIR . uniqid() . '.png';
//    $success = file_put_contents($file, $data);
//    $image = 'https://' . $_SERVER['SERVER_NAME'] . '/api/' . $file;
//
//    $sql_update = "UPDATE `users` SET `profilepic` = '$image'  WHERE id='" . $user_id . "'";
//
//    $result_update = mysqli_query($conn, $sql_update);
//
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user_id . "'");
    $count = mysqli_num_rows($sql);
    if ($count > 0) {
        $rows['success'] = 1;
        $rows['message'] = "Profile pic uploaded successfully ";
        $rows['image'] = mysqli_fetch_assoc($sql)['profilepic'];
        echo (json_encode($rows));
        die();
    }
} else {

    $rows['success'] = 0;
    $rows['message'] = "Authentication failed.";

    echo (json_encode($rows));

    die();
}
?>