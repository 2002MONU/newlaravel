<?php

//$ipAddress = '';
//
//// Check for shared internet/ISP IP
//if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//    $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
//}
//// Check for IP from a proxy or load balancer
//elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//    $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
//}
//// Remote address may be the only IP address if none of the above are present
//else {
//    $ipAddress = $_SERVER['REMOTE_ADDR'];
//}
//
//print_r($ipAddress);
//die;
//$userIP = getUserIP();
//echo "User IP Address: " . $userIP;
include('config.php');
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$bankname = $_POST['bankname'];
$account = $_POST['account'];
$ifsc = $_POST['ifsc'];
$panno = $_POST['panno'];
$aadhaar = $_POST['aadhaar'];

/* if ($panno == '') {
  $rows['success'] = 0;
  $rows['message'] = "Pan Number required";
  echo (json_encode($rows));
  exit();
  $panno = NULL;
  } */
if ($bankname == '') {
    $rows['success'] = 0;
    $rows['message'] = "Bank name required";
    echo (json_encode($rows));
    exit();
    $bankname = NULL;
}
if ($ifsc == '') {
    $rows['success'] = 0;
    $rows['message'] = "IFSC Code required";
    echo (json_encode($rows));
    exit();
    $ifsc = NULL;
}
if ($name == '') {
    $rows['success'] = 0;
    $rows['message'] = "Name required";
    echo (json_encode($rows));
    exit();
    $name = NULL;
}
if ($account == '') {
    $rows['success'] = 0;
    $rows['message'] = "Account Number required";
    echo (json_encode($rows));
    exit();
    $account = NULL;
}

/*
  if ($panno != '') {
  if (!preg_match('/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/', $panno)) {
  $rows['success'] = 0;
  $rows['message'] = "Pan Number not valid";
  echo (json_encode($rows));
  exit();
  }
  }
 */
if ($account != '') {
    if (!preg_match('/^[0-9]{10,}+$/', $account)) {
        $rows['success'] = 0;
        $rows['message'] = "Account Number not valid";
        echo (json_encode($rows));
        exit();
    }
}

if ($bankname != '') {
    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $bankname)) {
        $rows['success'] = 0;
        $rows['message'] = "Bank Name not valid";
        echo (json_encode($rows));
        exit();
    }
}
if ($ifsc != '') {
    if (!preg_match('/^[a-zA-Z]+[0-9]+$/', $ifsc)) {
        $rows['success'] = 0;
        $rows['message'] = "IFSC not valid";
        echo (json_encode($rows));
        exit();
    }
}
if ($name != '') {
    if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
        $rows['success'] = 0;
        $rows['message'] = "Name not valid";
        echo (json_encode($rows));
        exit();
    }
}
/*
  if ($aadhaar != '') {
  if (!preg_match('/^[0-9]+$/', $aadhaar)) {
  $rows['success'] = 0;
  $rows['message'] = "Aadar not valid";
  echo (json_encode($rows));
  exit();
  }
  }
 */
$sql = mysqli_query($conn, "SELECT * FROM kyc WHERE user_id='" . $user_id . "'");
$count = mysqli_num_rows($sql);
if ($count > 0) {
    //to check bank and aadhar details unique


    $acc_check = mysqli_query($conn, "SELECT * FROM kyc WHERE BINARY account='" . $account . "'");
    $acc_cnt = mysqli_num_rows($acc_check);

    if ($acc_cnt > 0) {
        $rows['success'] = 0;
        $rows['message'] = "Account no already exist give another.";
    } else {
        $insertquery = mysqli_query($conn, "update kyc set name='" . $name . "', bankname='" . $bankname . "', account='" . $account . "'"
                . ", ifsc='" . $ifsc . "',bank_status = 'pending',is_bank='yes',is_upi='no',bank_approve='pending' WHERE user_id='" . $user_id . "'");
        $insertquery;
        $rows['success'] = 1;
        $rows['message'] = "User Bank Details Saved";
    }
    echo (json_encode($rows));
    exit;
} else {
    //to check bank and aadhar details unique
//    echo $user_id;
//    print_r($_POST);
//    die;

    if ($user_id != '') {

        $acc_check = mysqli_query($conn, "SELECT * FROM kyc WHERE BINARY account='" . $account . "'");
        $acc_cnt = mysqli_num_rows($acc_check);

        if ($acc_cnt > 0) {
            $rows['success'] = 0;
            $rows['message'] = "Account no already exist give another.";
        } else {
            $sqlr = "INSERT INTO `kyc` (`kid`, `user_id`, `name`, `bankname`, `account`, `ifsc`, `panno`, `aadhaar`,`bank_status`,`is_bank`,`bank_approve`) VALUES (NULL, '" . $user_id . "','" . $name . "','" . $bankname . "', '" . $account . "', '" . $ifsc . "','" . $panno . "','" . $aadhaar . "','pending','yes','pending')";
            $result = mysqli_query($conn, $sqlr);
            $lastid = mysqli_insert_id($conn);

            $rows['success'] = 1;
            $rows['message'] = "User Bank Details Saved";
        }
    } else {

        $rows['success'] = 0;
        $rows['message'] = "user id not matched Or empty ";
    }
}

echo (json_encode($rows));
?>

