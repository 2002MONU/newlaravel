<?php

include('config.php');
$user_id = $_POST['user_id'];
$password = $_POST['password'];
$new_pass = $_POST['new_pass'];


$sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user_id . "' AND BINARY password ='" . $password . "'");
$count = mysqli_num_rows($sql);
if ($count > 0) {


    $insertquery = mysqli_query($conn, "update users set password='" . $new_pass . "' WHERE id='" . $user_id . "'");
    $insertquery;


    while ($row = mysqli_fetch_assoc($sql)) {


        $username = $row['name'];
        $mobile = $row['mobile'];
        $useremail = $row['email'];

        $subject = "$app_name - Change password request";
        $message = "<html><body>";
        $message .= "<h3>Hello  $username!</h3>";
        $message .= "<p>Your password has been changed. </p>";
        $message .= "<p>Thanks and Regards</p>";
        $message .= "<p>$app_name Support Team</p>";
        $message .= "</body></html>";


// Always set content-type when sending HTML email
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= "From: <$from_email>" . "\r\n";
//$headers .= 'Cc: autowaves@gmail.com' . "\r\n";

        mail($useremail, $subject, $message, $headers);



        $rows['success'] = 1;
        $rows['message'] = "Password has sent been changed";
    }
} else {
    $rows['success'] = 0;
    $rows['message'] = "Inavlid User";
}

echo (json_encode($rows));
?>