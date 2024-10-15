<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit']) && $_POST['name'] != '' && $_POST['mobile'] != '') {
    require_once 'admin/config.php';

    require 'api/PHPMailer/src/Exception.php';
    require 'api/PHPMailer/src/PHPMailer.php';
    require 'api/PHPMailer/src/SMTP.php';

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $description = $_POST['message'];
    $through = 'Website';

    $created_at = time();
    $sqlr = "INSERT INTO `contact_enquiries` (`name`, `mobile`, `email`, `message`,`through`, `created_at`) VALUES ('" . $name . "','" . $mobile . "','" . $email . "', '" . $description . "', '" . $through . "','" . $created_at . "')";
    $result = mysqli_query($conn, $sqlr);

    $subject = "Ludo C New enquiry request";
    $message = "<html><body>";
    $message .= "<h3>Following are enquiry details:</h3>";
    $message .= "<p>Name : " . $name . ".</p>";
    $message .= "<p>Mobile : " . $mobile . ".</p>";
    $message .= "<p>email : " . $email . ".</p>";
    $message .= "<p>Message : " . $description . ".</p>";
    $message .= "<p>Thanks and Regards</p>";
    $message .= "<p>Ludo C</p>";
    $message .= '</body></html>';

    $useremail = 'gameludoc@gmail.com';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp-relay.sendinblue.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'gameludoc@gmail.com';
    $mail->Password = '1Wr58gfGsMZkLVzB';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('info@charitygamez.com', 'ludoC');
    $mail->addReplyTo('no_reply@charitygamez.com', 'ludoC');

// Add a recipient
    $mail->addAddress($useremail);

// Email subject
    $mail->Subject = $subject;

// Set email format to HTML
    $mail->isHTML(true);

    $mail->Body = $message;

// Send email
    if (!$mail->send()) {
        //echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; die;
    } else {
        //echo 'Message has been sent.';
    }

    echo "<script> alert('Request Sent Successfully');document.location.href='index.php';</script>";
} else {
    echo "<script> document.location.href='index.php';</script>";
}
?>