<?php

require('config.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$sql = mysqli_query($conn, "SELECT * FROM constants WHERE id='" . 1 . "'");
$data = mysqli_fetch_assoc($sql);

$arr = array('status' => "valid", 'message' => "Constants", "data" => $data);
echo json_encode($arr, JSON_PRETTY_PRINT);
?>
