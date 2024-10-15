<?php

require('config.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$sql = mysqli_query($conn, "SELECT description as link FROM cms WHERE id='" . 7 . "'");
$data = mysqli_fetch_array($sql);

$arr = array('status' => "valid", 'message' => "How to Play", "link" => $data['link']);
echo json_encode($arr, JSON_PRETTY_PRINT);
?>
