<?php

$connect = mysqli_connect('localhost','root','','exportfile');

if(!$connect){
    echo "Database not connect";
}