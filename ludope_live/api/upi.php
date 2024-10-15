<?php

include('config.php');
$user_id = $_POST['user_id'];
$upi_name = $_POST['upi_name'];
$upi_id = $_POST['upi_id'];

if ($upi_id == '') {
    $rows['success'] = 0;
    $rows['message'] = "UPI Id required";
    echo (json_encode($rows));
    exit();
    $upi_id = NULL;
}
if ($upi_name == '') {
    $rows['success'] = 0;
    $rows['message'] = "UPI Name required";
    echo (json_encode($rows));
    exit();
    $upi_name = NULL;
}


$sql = mysqli_query($conn, "SELECT * FROM kyc WHERE user_id='" . $user_id . "'");

$count = mysqli_num_rows($sql);
if ($count > 0) {

    $upi_check = mysqli_query($conn, "SELECT * FROM kyc WHERE upi_id='" . $upi_id . "'");
    $upi_cnt = mysqli_num_rows($upi_check);

    if ($upi_cnt > 0) {

        $rows['success'] = 0;
        $rows['message'] = "Upi id already taken.";
    } else {
        $insertquery = mysqli_query($conn, "update kyc set upi_id='" . $upi_id . "',upi_name='" . $upi_name . "',"
                . "upi_status='pending',is_upi='yes',is_bank='no',bank_approve='pending' WHERE user_id='" . $user_id . "'");

        $rows['success'] = 1;
        $rows['message'] = "User UPI Details Saved";
    }
    echo (json_encode($rows));
    exit;
} else {

//    echo $user_id;
//    print_r($_POST);
//    die;

    if ($user_id != '') {
        $upi_check = mysqli_query($conn, "SELECT * FROM kyc WHERE BINARY upi_id='" . $upi_id . "'");
        $upi_cnt = mysqli_num_rows($upi_check);

        if ($upi_cnt > 0) {

            $rows['success'] = 0;
            $rows['message'] = "Upi id already taken.";
        } else {
            $sqlr = "INSERT INTO `kyc` (`user_id`, `upi_id`,`upi_name`,`upi_status`,`is_upi`,`bank_approve`) VALUES ('" . $user_id . "','" . $upi_id . "','" . $upi_name . "','pending','yes','pending')";

            $result = mysqli_query($conn, $sqlr);
            $lastid = mysqli_insert_id($conn);

            $rows['success'] = 1;
            $rows['message'] = "User UPI Details Saved";
        }
    } else {
        $rows['success'] = 0;
        $rows['message'] = "user id not matched Or empty ";
    }
}

echo (json_encode($rows));
?>