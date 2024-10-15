<?php

include('config.php');
$userid = $_POST['userid'];
$amount = $_POST['amount'];
$getaway = $_POST['getaway'];
//$payment_request_mode = $_POST['payment_request_mode'];

if ($constants['minimium_withdraw'] != '') {
    $minimium_withdraw = $constants['minimium_withdraw'];
} else {
    $minimium_withdraw = 1000;
}
if ($constants['maximum_withdraw'] != '') {
    $maximum_withdraw = $constants['maximum_withdraw'];
} else {
    $maximum_withdraw = 3000;
}
if ($amount < $minimium_withdraw) {
    $rows['success'] = 0;
    $rows['message'] = "Minimum withdrawal limit is Rs/-" . $minimium_withdraw;
    echo (json_encode($rows));
    exit;
}
if ($amount > $maximum_withdraw) {
    $rows['success'] = 0;
    $rows['message'] = "Maximum withdrawal limit is Rs/-" . $maximum_withdraw;
    echo (json_encode($rows));
    exit;
}
if ($userid != '') {

    function generateRandomString($length = 8) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $orderid = generateRandomString();

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
    while ($row = mysqli_fetch_assoc($sql)) {

        $trnsid = '0';
        $status = 'In Process';
        $trnstype = 'withdrawal';
        $coins = $row['coins'];
        $winning_amount = $row['winning_amount'];

        if ($amount < $winning_amount) {
//            $newcoins = $row['coins'] - $amount;
            $new_winning_amount = $row['winning_amount'] - $amount;
        } else {
            $rows['success'] = 0;
            $rows['message'] = "Your withdraw request failed,Your winning amount is less";
            echo (json_encode($rows));
            die;
        }//echo $rows['message'];echo "shaik";die;
//        coins='" . $newcoins . "',
        $bsql=mysqli_query($conn, "SELECT * FROM kyc WHERE user_id='".$userid."' and status='Approved'");
	$count = mysqli_num_rows($bsql);
	    if($count > 0){ 
        $insertquery = mysqli_query($conn, "update users set winning_amount='" . $new_winning_amount . "' WHERE id='" . $userid . "'");

        $sqlr = "INSERT INTO `payment` (`pid`, `uid`, `orderid`, `trnsid`, `status`, `trnstype`, `amount`, `getway`, `datetime`) VALUES (NULL, '" . $userid . "','" . $orderid . "','" . $trnsid . "', '" . $status . "','" . $trnstype . "','" . $amount . "','" . $getaway . "', '" . $current_timestamp . "')";
        $result = mysqli_query($conn, $sqlr);

        $rows['success'] = 1;
        $rows['message'] = "We have received withdraw request successfully";
//        $rows['coins'] = $newcoins;
        $rows['coins'] = $new_winning_amount;
            }else {

    $rows['success'] = 0;
    $rows['message'] = "KYC Not Approved";
}
    }
} else {

    $rows['success'] = 0;
    $rows['message'] = "Something went wrong";
}


echo (json_encode($rows));
?>