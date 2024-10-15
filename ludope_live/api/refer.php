<?php

include("config.php");
$userid = $_POST['userid'];
$name = $_POST['name'];

$email = $_POST['email'];
if ($constants['referrer_amount']) {
    $referrer_amount = $constants['referrer_amount'];
} else {
    $referrer_amount = 0;
}
if ($constants['referral_amount']) {
    $referral_amount = $constants['referral_amount'];
} else {
    $referral_amount = 0;
}

$refercode = strtoupper($_POST['refercode']);
if (!empty($refercode)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE BINARY refercode='" . $refercode . "'");
    $count = mysqli_num_rows($sql);

    if ($count > 0) {
        if ($refercode) {
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE BINARY refercode='" . $refercode . "'");
            $count = mysqli_num_rows($sql);
            if ($count > 0) {

                $result1 = mysqli_fetch_assoc($sql);
                $refered_by = $result1['id'];
                $sqlr = "INSERT INTO `refered` (`rid`, `rcode`, `uid`, `status`, `referdate`, `date`,`refered_by`,`referrer_amount`,`referee_amount`) VALUES (NULL, '" . $refercode . "', '" . $userid . "', '1',  CURRENT_TIMESTAMP,  NULL,'" . $refered_by . "','" . $referrer_amount . "','" . $referral_amount . "')";
                $result = mysqli_query($conn, $sqlr);

                $sql1 = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $refered_by . "'");
                while ($row = mysqli_fetch_assoc($sql1)) {
                    $newcoins = $row['bonus'] + $referrer_amount;
                }




                $insertquery1 = mysqli_query($conn, "update users set bonus='" . $newcoins . "' WHERE id='" . $refered_by . "'");
                $insertquery1;

                $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
                while ($row1 = mysqli_fetch_assoc($sql2)) {
                    $newcoins1 = $row1['bonus'] + $referral_amount;
                }




                $insertquery2 = mysqli_query($conn, "update users set bonus='" . $newcoins1 . "' WHERE id='" . $userid . "'");
                $insertquery2;

                $updateReferStatus = mysqli_query($conn, "update users set name='" . $name . "',refer_id='" . $refered_by . "',email='" . $email . "', refer='YES',email_verified='YES',ref_amount='" . $referral_amount . "' WHERE id='$userid'");
                $rows['success'] = 1;
                $rows['message'] = "Refercode matched";
                $rows['data']['otp'] = '';
            }
            if ($email) {
                $insertname = mysqli_query($conn, "update users set name='" . $name . "',email='" . $email . "',email_verified='YES',refer='YES' WHERE id='" . $userid . "'");
            }
        }
    } else {

        $rows['success'] = 0;
        $rows['message'] = "Refer code does not exist.";
    }
} else {

    $insertname = mysqli_query($conn, "update users set name='" . $name . "',email='" . $email . "',email_verified='YES',refer='YES' WHERE id='" . $userid . "'");
    $rows['success'] = 1;
    $rows['message'] = "User info updated ";
    $rows['data']['email'] = $email;
    $rows['data']['username'] = $name;
    //$rows['data']['email'] = '';
}
echo (json_encode($rows));
?>