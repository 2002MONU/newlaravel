<?php

include("config.php");

$rows['success'] = 1;
$rows['message'] = "Success";
for ($i = 1; $i <= 14; $i++) {
    $rows['data'][] = array('image' => $profile_img_path . 'avatar' . $i . '.png');
}

echo (json_encode($rows));
