<?php

include('config.php');
$user_id = $_REQUEST['mobile'];

/*use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'PHPMailer/src/Exception.php'; 
require 'PHPMailer/src/PHPMailer.php'; 
require 'PHPMailer/src/SMTP.php'; */


//$new_pass = rand(1111111, 9999999);
$otp=rand(999,9999);
$sql = mysqli_query($conn, "SELECT * FROM users WHERE mobile='" . $user_id . "'");
$count = mysqli_num_rows($sql);
if ($count > 0) {

    while ($row = mysqli_fetch_assoc($sql)) {

        //if ($row['password'] == '') {
            $insertquery = mysqli_query($conn, "update users set otp='" . $otp . "' WHERE mobile='" . $user_id . "'");
         $admin_message = "Dear user,
Your Topup Ludo OTP is " . $otp . " use this for signup purpose only and please do not share this OTP with anyone.
Regards,
Topup Ludo Team
Sklite Games Pvt Ltd";
    //$admin_message = "Your LUDO One Time Password(OTP) is- " . $otp . " Don't share Your OTP to anyone.";

    $message = urlencode($admin_message);
    send_sms($user_id, $message);
    //$password = $new_pass;
        //} else {
          //  $password = $row['password'];
        //}
        
        //$username = $row['name'];
        //$mobile = $row['mobile'];
        //$useremail = $row['email'];
        //$password = $password;
       /* $subject = "$app_name - Password request";
        $message = "<html><body>";
        $message .= "<h3>Hello $username !</h3>";
        $message .= "<p>Your password is " . $password . ".</p>";
        $message .= "<p>Thanks and Regards</p>";
        $message .= "<p>$app_name Support Team</p>";
        $message .= '</body></html>';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host     = 'smtp-relay.sendinblue.com';
$mail->SMTPAuth = true;
$mail->Username = 'gameludoc@gmail.com';
$mail->Password = '1Wr58gfGsMZkLVzB';
$mail->SMTPSecure = 'tls';
$mail->Port     = 587;

$mail->setFrom('info@charitygamez.com', 'Ludo C'); 
$mail->addReplyTo('no_reply@charitygamez.com', 'Ludo C'); 
 
// Add a recipient 
$mail->addAddress($useremail); 
  
// Email subject 
$mail->Subject = $subject; 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
$mail->Body = $message; 
 
// Send email 
if(!$mail->send()){ 
    //echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
}else{ 
    //echo 'Message has been sent.'; 
}

*/

        $rows['success'] = 1;
        $rows['message'] = "OTP has sent to your registered Mobile ";
        $rows['data'] = array('userid'=>$row['id']);
    }
} else {
    $rows['success'] = 0;
    $rows['message'] = "Mobile does not exist, Please Register now!";
}

echo (json_encode($rows));
?>