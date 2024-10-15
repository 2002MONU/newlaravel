<?php

include('config.php');

$user_id = $_POST['user_id'];

$sql = mysqli_query($conn, "SELECT kid,user_id,status,reason,panno,aadhaar,datetime FROM kyc WHERE user_id='" . $user_id . "' AND status != ''");
$count = mysqli_num_rows($sql);
if ($count > 0) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($sql)) {

        //for kyc details
        if ($row['status'] == 'Rejected' || $row['status'] == '') {
            if ($row['status'] == '') {
                $row['status'] = 'pending';
                $row['kyc_status'] = (string) 0;
            } else {
                $row['status'] = $row['status'];
                $row['kyc_status'] = (string) 0;
            }
        } else {
            $row['kyc_status'] = (string) 1;
        }

        //for bank details
//        if ($row['bank_status'] == 'Rejected' || $row['bank_status'] == '') {
//            if ($row['bank_status'] == '') {
//                $row['bank_status'] = 'pending';
//                $row['bankstatus'] = (string) 0;
//            } else {
//                $row['bank_status'] = $row['bank_status'];
//                $row['bankstatus'] = (string) 0;
//            }
//        } else {
//            $row['bankstatus'] = (string) 1;
//        }
//
//        if ($row['upi_status'] == 'Rejected' || $row['upi_status'] == '') {
//            if ($row['upi_status'] == '') {
//                $row['upi_status'] = 'pending';
//                $row['upistatus'] = (string) 0;
//            } else {
//                $row['upi_status'] = $row['upi_status'];
//                $row['upistatus'] = (string) 0;
//            }
//        } else {
//            $row['upistatus'] = (string) 1;
//        }




        $row['reject_reason'] = $row['reason'];
        $rows['success'] = 1;
        $rows['message'] = "KYC Details successfully";
        $rows['data'][$i] = $row;
        $i++;
    }
} else {
    $rows['success'] = 0;
    $rows['message'] = "Please add kyc and bank details to proceed ";
}

echo (json_encode($rows));
?>