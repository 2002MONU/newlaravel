<?php

include("config.php");
if($_REQUEST['current_month']){$type=$_REQUEST['current_month'];}else{$type=0;}
if($_REQUEST['board_type']){$board_type=$_REQUEST['board_type'];}else{$board_type=2;}
$sqlnew = mysqli_query($conn, "SELECT name,coins FROM leader_board where type='$type' and board_type='$board_type' order by coins DESC");
$i = 0;
if(mysqli_num_rows($sqlnew)>0)
{
while ($rownew = mysqli_fetch_assoc($sqlnew)) {
    $rows['success'] = 1;
    $rows['message'] = "Success";
    $rows['data'][$i] = $rownew;
    $i++;
}
}else
{
    $rows['success'] = 0;
    $rows['message'] = "No data";
    
}
echo (json_encode($rows));
