<?php

require_once 'config.php';

function Get_users($uid) {
    $userinfo = array();

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE pid='" . $uid . "'");
    while ($user = mysqli_fetch_assoc($sql)) {
        $userinfo[] = $user;
    }
    return $userinfo;
}

function Getallusers() {

    $query = mysqli_query($conn, " select * from users");

    while ($row = mysqli_fetch_assoc($query)) {
        $userinfo[] = $row;
    }


    return $userinfo;
}

?>