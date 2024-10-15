<?php

include('config.php');

$user_id = $_POST['user_id'];

$sql = mysqli_query($conn, "SELECT kid,user_id,name,bankname,account,ifsc,bank_status,reason_bank,datetime FROM kyc WHERE user_id='" . $user_id . "' AND bank_status != ''");
$count = mysqli_num_rows($sql);
if ($count > 0) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($sql)) {



        //for bank details
        if ($row['bank_status'] == 'Rejected' || $row['bank_status'] == '') {
            if ($row['bank_status'] == '') {
                $row['bank_status'] = 'pending';
                $row['bankstatus'] = (string) 0;
            } else {
                $row['bank_status'] = $row['bank_status'];
                $row['bankstatus'] = (string) 0;
            }
        } else {
            $row['bankstatus'] = (string) 1;
        }





        $row['reject_reason_bank'] = $row['reason_bank'];
        $rows['success'] = 1;
        $rows['message'] = "Bank Details successfully";
        $rows['data'][$i] = $row;
        $i++;
    }
} else {
    $rows['success'] = 0;
    $rows['message'] = "Please add bank details to proceed ";
}

echo (json_encode($rows));
?>