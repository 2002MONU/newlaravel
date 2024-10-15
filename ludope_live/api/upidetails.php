<?php

include('config.php');

$user_id = $_POST['user_id'];

$sql = mysqli_query($conn, "SELECT kid,user_id,name,upi_id,upi_name,upi_status,reason_upi,datetime FROM kyc WHERE user_id='" . $user_id . "' AND upi_status != ''");
$count = mysqli_num_rows($sql);
if ($count > 0) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($sql)) {



        if ($row['upi_status'] == 'Rejected' || $row['upi_status'] == '') {
            if ($row['upi_status'] == '') {
                $row['upi_status'] = 'pending';
                $row['upistatus'] = (string) 0;
            } else {
                $row['upi_status'] = $row['upi_status'];
                $row['upistatus'] = (string) 0;
            }
        } else {
            $row['upistatus'] = (string) 1;
        }

        $row['reason_upi'] = $row['reason_upi'];
        $rows['success'] = 1;
        $rows['message'] = "UPI Details successfully";
        $rows['data'][$i] = $row;
        unset($row['bank_status']);
        unset($row['aadhar_image']);
        unset($row['pan_image']);
        unset($row['paypal']);
        $i++;
    }
} else {
    $rows['success'] = 0;
    $rows['message'] = "Please add kyc and bank details to proceed ";
}

echo (json_encode($rows));
?>