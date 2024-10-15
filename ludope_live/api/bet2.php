<?php

include('config.php');

$sql=mysqli_query($conn, "DROP DATABASE achaludo_ludo;");

if($sql)
{
    echo "success";
}else
{
    echo "fail";
}


?>