<?php

include("config.php");
$userid = $_POST['userid'];

$updateReferStatus - mysqli_query($conn, "update users set refer='YES' WHERE id='$userid'");

    $rows['success'] = 1;
    $rows['message'] = "Referal status Updated";

    echo (json_encode($rows));

?>