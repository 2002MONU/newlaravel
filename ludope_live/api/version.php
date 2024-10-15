<?php

include('config.php');
$current_version = $_REQUEST['current_version'];

if (!empty($current_version)) {

    if ($current_version <= $constants['current_version']) {
        $rows['success'] = 1;
        $rows['message'] = "Your using latest version";
        $rows['data'] = $apk_url;
    } else {

        $rows['success'] = 0;
        $rows['message'] = "Latest Version Available, please update your app";
        $rows['data'] = $apk_url;
    }
} else {
    $rows['success'] = 0;
    $rows['message'] = "Send Current Version";
}

echo (json_encode($rows));
