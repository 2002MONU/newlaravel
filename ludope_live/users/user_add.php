<?php

require_once 'config.php';
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$name = $_POST['name'];
$password = $_POST['password'];

$sql_user = mysqli_query($conn, "select * from `users` where email = '$email' OR mobile = '$mobile'");
$user_count = mysqli_num_rows($sql_user);

if ($user_count > 0) {
    echo "<script>document.location.href = 'list_user.php?msg=user_exist'</script>";
    die;
} else {
    $token = md5(uniqid(rand(), true));
    $size = 8;
    $refercode = strtoupper(substr(md5(time() . rand(10000, 99999)), 0, $size));
    $profile = $base_url . '/admin/profile.jpg';
    $pid = $_SESSION['uid'];

    $sqlr = "INSERT INTO `users` (`id`, `pid`,`name`, `tournament`, `coins`, `points`, `bonus`, `email`, `mobile`, `password`, `profilepic`, `token`, `lastlogin`, `refer`, `status`, `registerd`, `refercode`) VALUES (NULL, '" . $pid . "', '" . $name . "', '0', '0', '0', '0', '" . $email . "', '" . $mobile . "', '" . $password . "','" . $profile . "', '" . $token . "', NULL, 'NO', '1', CURRENT_TIMESTAMP, '" . $refercode . "')";

    if (mysqli_query($conn, $sqlr)) {
//        echo "User Added / Updated Successfully...";
        echo "<script>document.location.href = 'list_user.php?msg=user_add'</script>";
        die;
    } else {
        echo "<script>document.location.href = 'list_user.php?msg=error'</script>";
        die;
    }
}
?>