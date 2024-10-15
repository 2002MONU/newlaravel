<?php

include("config.php");
$userid = $_POST['userid'];
if ($userid == '') {
    $rows['success'] = 0;
    $rows['message'] = "User ID required";
    echo (json_encode($rows));
    exit();
}
if (isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

    $extensions = array("jpeg", "jpg", "png");
    $file_name1 = time() . "." . $file_ext;
    if (in_array($file_ext, $extensions) === false) {
        $rows['success'] = 0;
        $rows['response'] = "extension not allowed, please choose a JPEG or PNG file";
        echo (json_encode($rows));
        die;
    }

    if ($file_size > 5242880) {
        $rows['success'] = 0;
        $rows['response'] = "File size must be excately 5 MB";
        echo (json_encode($rows));
        die;
    }

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "../img/profiles/" . $file_name1);
        $file_name1 = $profile_img_path . $file_name1;
        mysqli_query($conn, "update users set profilepic='" . $file_name1 . "' WHERE id='" . $userid . "'");

        $rows['success'] = 1;
        $rows['response'] = $file_name1;
    } else {
        $rows['success'] = 1;
        $rows['response'] = print_r($errors);
    }
} else {
    $rows['success'] = 0;
    $rows['response'] = "Failed, File required.";
}
echo (json_encode($rows));
?>