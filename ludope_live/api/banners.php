<?php

include("config.php");

$sqlnew = mysqli_query($conn, "SELECT image FROM banners");
$i = 0;
while ($rownew = mysqli_fetch_assoc($sqlnew)) {
    $rows['success'] = 1;
    $rows['message'] = "Success";
    $rows['data'][$i] = $rownew;
    $i++;
}
echo (json_encode($rows));
