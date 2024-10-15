<?php

require_once 'config.php';
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$name = $_POST['name'];
$password = $_POST['password'];
$uid = $_POST['id'];

$sql_user = mysqli_query($conn, "select * from `users` where (email = '$email' OR mobile = '$mobile') and id != '$uid'");
$user_count = mysqli_num_rows($sql_user);

if ($user_count > 0) {
    echo "<script>document.location.href = 'list_user.php?msg=user_exist'</script>";
    die;
} else {
    $sqlr = "UPDATE `users` SET password = '$password',name='$name',email='$email',mobile='$mobile'  where id='$uid'";
    if (mysqli_query($conn, $sqlr)) {
        echo "<script>document.location.href = 'list_user.php?msg=user_update'</script>";
        die;
    } else {
        echo "<script>document.location.href = 'list_user.php?msg=error'</script>";
        die;
    }
}
?>