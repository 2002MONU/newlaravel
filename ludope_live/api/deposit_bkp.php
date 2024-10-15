<?php
include('config.php');
//require('razorpay-php/Razorpay.php');
session_start();
$userid = $_GET['userid'];
$amountn = $_GET['amount'];
$email = $_GET['email'];
$name = $_GET['name'];
//$contact = $_GET['contact'];
$contact = '6303575401';

//if ($constants['minimum_deposit'] != '') {
//    $minimum_deposit = $constants['minimum_deposit'];
//} else {
//    $minimum_deposit = 100;
//}
//if ($constants['maximum_deposit'] != '') {
//    $maximum_deposit = $constants['maximum_deposit'];
//} else {
//    $maximum_deposit = 1000;
//}
//if ($amount < $minimum_deposit) {
//    $rows['success'] = 0;
//    $rows['message'] = "Minimum deposit should be Rs/-" . $minimum_deposit;
//    echo (json_encode($rows));
//    exit;
//}
//if ($amount > $maximum_deposit) {
//    $rows['success'] = 0;
//    $rows['message'] = "Maximum deposit limit is Rs/-" . $maximum_deposit;
//    echo (json_encode($rows));
//    exit;
//}
?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width,minimum-scale=1.0, maximum-scale=1.0" />
        <title>Payment</title>
        <link rel="stylesheet" href="css/style.css">
    <body style="backgro">
        <img src="<?= $logo_url ?>" style='max-width:300px'>


        <?php
        echo '<h2>' . $amountn . ' INR </h2>';

        function generateRandomString($length = 8) {
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return "ORDS" . $randomString;
        }

        $orderid = generateRandomString();


        $displayAmount = $amount = $orderData['amount'];

        if ($displayCurrency !== 'INR') {
            $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
            $exchange = json_decode(file_get_contents($url), true);

            $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
        }


        $trnsid = '0';
        $status = 'In Process';
        $trnstype = 'desposite';
        $newcoins = $amountn;

        $sqlr = "INSERT INTO `payment` (`pid`, `uid`, `orderid`, `trnsid`, `status`, `trnstype`, `amount`, `getway`, `datetime`) VALUES (NULL, '" . $userid . "','" . $orderid . "','" . $razorpayOrderId . "', '" . $status . "','" . $trnstype . "','" . $newcoins . "','" . $getaway . "', '" . $current_timestamp . "')";
        $result = mysqli_query($conn, $sqlr);

        require("PaytmKit/TxnTest.php");
        ?>
    </body>
</html>