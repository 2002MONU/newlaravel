<?php

include("config.php");

$sqlnew = mysqli_query($conn, "SELECT id,fee,no_of_winers,pot_limit,win_upto,second_price FROM new_game order by id desc");
$i = 0;
while ($rownew = mysqli_fetch_assoc($sqlnew)) {
    $rows['success'] = 1;
    $rows['message'] = "Success";
    $rows['data'][$i] = $rownew;
    $i++;
}
echo (json_encode($rows));
