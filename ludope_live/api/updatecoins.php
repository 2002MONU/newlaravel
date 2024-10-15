<?php

include('config.php');
$userid = $_POST['user_id'];
$token = $_POST['token'];
$coins = $_POST['coins'];

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
$sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "' AND token='" . $token . "'");

$count = mysqli_num_rows($sql);
if ($count > 0) {




    while ($row = mysqli_fetch_assoc($sql)) {


        $newcoins = $row['coins'] + $coins;
        $insertquery = mysqli_query($conn, "update users set coins='" . $newcoins . "' WHERE id='" . $userid . "'");

        $trnsid = '0';
        $status = 'Success';
        $trnstype = 'FreeCoins';
        $getaway = 'Lucky Roulette';


        $sqlr = "INSERT INTO `payment` (`pid`, `uid`, `orderid`, `trnsid`, `status`, `trnstype`, `amount`, `getway`) VALUES (NULL, '" . $userid . "','" . $orderid . "','" . $orderid . "', '" . $status . "','" . $trnstype . "','" . $newcoins . "','" . $getaway . "')";
        $result = mysqli_query($conn, $sqlr);

        $rows['success'] = 1;
        $rows['coins'] = $newcoins;
        $rows['bonus'] = $row['bonus'];
        $rows['points'] = $row['points'];
        $rows['winning_amount'] = $row['winning_amount'];
    }
} else {
    $rows['success'] = 0;
    $rows['message'] = "Token or user id not matched.";
}

echo (json_encode($rows));
?>