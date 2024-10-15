<?php

include('config.php');

$mobile = $_POST['mobile'];

$sql = mysqli_query($conn, "SELECT * FROM users WHERE mobile='" . $mobile . "'");
$count = mysqli_num_rows($sql);
if ($count > 0) {


    while ($row = mysqli_fetch_assoc($sql)) {

        
         if ($row['otp_verified'] == 'not_verified') {
            $rows['success'] = 'invalid';
        $rows['message'] = "Not Verified";
        $rows['data']['userId'] = $row['id'];
        $rows['data']['otp'] = $otp; 
        
          mysqli_query($conn, "update users set otp='" . $otp . "' WHERE id='" . $row['id'] . "'");
             $admin_message = "Dear user,
Your Topup Ludo OTP is " . $otp . " use this for signup purpose only and please do not share this OTP with anyone.
Regards,
Topup Ludo Team
Sklite Games Pvt Ltd";
            $message = urlencode($admin_message);
            
            send_sms($row['mobile'], $message);
        }else{
            $rows['success'] = 'valid';
        $rows['message'] = "Verified";
        $rows['data']['userId'] = $row['id'];
        
            
        }

           
       
    }
} else {
    $rows['success'] = 0;
    $rows['message'] = "Invalid Mobile Number";
}

echo (json_encode($rows));
?>