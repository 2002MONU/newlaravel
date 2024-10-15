<?php

require('config.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$current_version = $_REQUEST['current_version'];
$latest_version = 1;
if (($current_version < $latest_version)) {
    $arr = array('status' => "invalid", 'message' => "We have launched its new version, Please update before proceeding.", "link" => "https://vsrgames.com/vsrludo.apk");
    echo json_encode($arr, JSON_PRETTY_PRINT);
} else {
    $arr = array('status' => "valid", 'message' => "You are using latest version.");
    echo json_encode($arr, JSON_PRETTY_PRINT);
}
?>
