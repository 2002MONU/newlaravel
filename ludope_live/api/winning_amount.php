<?php

require('config.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$user_id = $_REQUEST['userid'];

$sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user_id . "'");
//$sql=mysqli_query($conn, "SELECT * FROM users WHERE id='".$user_id."' AND token='".$token."'");
$userdata = mysqli_fetch_assoc($sql);
$amount = $userdata['winning_amount'];

$arr = array('status' => "valid", 'message' => "Winning Amount", "amount" => $amount);
echo json_encode($arr, JSON_PRETTY_PRINT);
?>
