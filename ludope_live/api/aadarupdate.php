<?php

include('config.php');
$user_id = $_POST['user_id'];
$panno = strtoupper($_POST['panno']);
$aadhaar = $_POST['aadhaar'];
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');


if ($_FILES['aadhar_image']['name'] != '') {
    $code = generatePassword();
    $oname = $_FILES["aadhar_image"]["name"];
    $pos = strrpos($oname, ".");
    $extension = substr($oname, $pos + 1);
    $extension = strtolower($extension);

    $tn = $_FILES["aadhar_image"]["tmp_name"];
    $path = "../uploads/" . $code . '.' . $extension;
    move_uploaded_file($tn, $path);
    $image = $code . '.' . $extension;
    $image_path1 = $image;
//    $image_url = IMAGE_PATH . $image;
    //$posts[] = array('status'=>'Valid','image_path'=>$_FILES);
}

if ($_FILES['pan_image']['name'] != '') {
    $code = generatePassword();
    $oname = $_FILES["pan_image"]["name"];
    $pos = strrpos($oname, ".");
    $extension = substr($oname, $pos + 1);
    $extension = strtolower($extension);

    $tn = $_FILES["pan_image"]["tmp_name"];
    $path = "../uploads/" . $code . '.' . $extension;
    move_uploaded_file($tn, $path);
    $image = $code . '.' . $extension;
    $image_path2 = $image;
//    $image_url = IMAGE_PATH . $image;
    //$posts[] = array('status'=>'Valid','image_path'=>$_FILES);
}


if ($panno == '') {
    $rows['success'] = 0;
    $rows['message'] = "Pan Number required";
    echo (json_encode($rows));
    exit();
    $panno = NULL;
}
if ($aadhaar == '') {
    $rows['success'] = 0;
    $rows['message'] = "Aadhar Number required";
    echo (json_encode($rows));
    exit();
    $aadhaar = NULL;
}
if ($panno != '') {
    if (!preg_match('/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/', $panno)) {
        $rows['success'] = 0;
        $rows['message'] = "Pan Number not valid";
        echo (json_encode($rows));
        exit();
    }
}

if ($aadhaar != '') {
    if (!preg_match('/^[0-9]+$/', $aadhaar)) {
        $rows['success'] = 0;
        $rows['message'] = "Aadar not valid";
        echo (json_encode($rows));
        exit();
    }
}

$sql = mysqli_query($conn, "SELECT * FROM kyc WHERE user_id='" . $user_id . "'");
$count = mysqli_num_rows($sql);
if ($count > 0) {

    $check_aadhar = mysqli_query($conn, "SELECT * FROM kyc WHERE BINARY aadhaar='" . $aadhaar . "'");
    $aadhar_count = mysqli_num_rows($check_aadhar);

    $pan_check = mysqli_query($conn, "SELECT * FROM kyc WHERE BINARY panno='" . $panno . "'");
    $pan_cnt = mysqli_num_rows($pan_check);

    if (($aadhar_count > 0) && ($pan_cnt > 0)) {

        $rows['success'] = 0;
        $rows['message'] = "PAN and Aadhar no already taken.";
    } else if ($aadhar_count > 0) {
        $rows['success'] = 0;
        $rows['message'] = "Aadhar no already taken.";
    } else if ($pan_cnt > 0) {
        $rows['success'] = 0;
        $rows['message'] = "Pan no already exist give another.";
    } else {


        $insertquery = mysqli_query($conn, "update kyc set aadhaar='" . $aadhaar . "', panno='" . $panno . "' , aadhar_image = '" . $image_path1 . "' , pan_image = '" . $image_path2 . "', status = 'pending'  WHERE user_id='" . $user_id . "'");
        $insertquery;
        $rows['success'] = 1;
        $rows['message'] = "User KYC Details Updated";
    }
    echo (json_encode($rows));
    exit;
} else {

//    echo $user_id;
//    print_r($_POST);
//    die;

    if ($user_id != '') {
        $check_aadhar = mysqli_query($conn, "SELECT * FROM kyc WHERE BINARY aadhaar='" . $aadhaar . "'");
        $aadhar_count = mysqli_num_rows($check_aadhar);

        $pan_check = mysqli_query($conn, "SELECT * FROM kyc WHERE BINARY panno='" . $panno . "'");
        $pan_cnt = mysqli_num_rows($pan_check);

        if ($aadhar_count > 0 && $pan_cnt > 0) {

            $rows['success'] = 0;
            $rows['message'] = "PAN and Aadhar no already taken.";
        } else if ($aadhar_count > 0) {
            $rows['success'] = 0;
            $rows['message'] = "Aadhar no already taken.";
        } else if ($pan_cnt > 0) {
            $rows['success'] = 0;
            $rows['message'] = "Pan no already exist give another.";
        } else {
            $sqlr = "INSERT INTO `kyc` (`user_id`, `name`, `bankname`, `account`, `ifsc`, `panno`, `aadhaar`,`aadhar_image`, `pan_image`,`status`) VALUES ('" . $user_id . "','" . $name . "','" . $bankname . "', '" . $account . "', '" . $ifsc . "','" . $panno . "','" . $aadhaar . "','" . $image_path1 . "','" . $image_path2 . "','pending')";

            $result = mysqli_query($conn, $sqlr);
            $lastid = mysqli_insert_id($conn);
            $rows['success'] = 1;
            $rows['message'] = "User KYC Details Saved";
        }
    } else {
        $rows['success'] = 0;
        $rows['message'] = "user id not matched Or empty ";
    }
}

echo (json_encode($rows));

function generatePassword($length = 10, $level = 2) {

    list($usec, $sec) = explode(' ', microtime());
    srand((float) $sec + ((float) $usec * 100000));

    $validchars[1] = "0123456789abcdfghjkmnpqrstvwxyz";
    $validchars[2] = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $validchars[3] = "0123456789_!@#$%&()-=+/abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_!@#$%&()-=+/";

    $password = "";
    $counter = 0;

    while ($counter < $length) {
        $actChar = substr($validchars[$level], rand(0, strlen($validchars[$level]) - 1), 1);

        // All character must be different
        if (!strstr($password, $actChar)) {
            $password .= $actChar;
            $counter++;
        }
    }

    return $password;
}

?>