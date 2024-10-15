<?php

include('config.php');
ob_start();
$session = session_start();

$username = $_POST['username'];
$password = $_POST['password'];

//$password = md5($pass);

if ($username != '') {
//$qry = "SELECT usrid, username, oauth FROM usermeta WHERE username='".$username."' AND pass='".$password."' AND status='active'";
//echo "SELECT * FROM Users WHERE email='".$username."' or mobile='".$username."'  AND pass='".$password."'";


    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='" . $username . "' AND password='" . $password . "' AND role='Admin' ");

    $row = mysqli_fetch_assoc($sql);
    if ($row) {

        $_SESSION['uid'] = $row['id'];
        $_SESSION['username'] = $username;
        echo "true";
    } else {
        echo 'false';
    }
}


$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$insert = $_POST['insert'];
$userid = $_POST['userid'];

if ($email != '' && $mobile != '' && $password != '') {
    if ($insert == '1') {



        $sql_user = mysqli_query($conn, "select * from `users` where email = '$email'");
        $user_count = mysqli_num_rows($sql_user);

        if ($user_count > 0) {

            echo $email . " is already exist in our database, Please try another one!";
        } else {

            $token = md5(uniqid(rand(), true));
            $size = 8;
            $refercode = strtoupper(substr(md5(time() . rand(10000, 99999)), 0, $size));
            $profile = 'https://dailyupdatework.in/ludo/vsrgames/admin/profile.jpg';
            $pid = $_SESSION['uid'];

            $sqlr = "INSERT INTO `users` (`id`, `pid`,`name`, `tournament`, `coins`, `points`, `bonus`, `email`, `mobile`, `password`, `profilepic`, `token`, `lastlogin`, `refer`, `status`, `registerd`, `refercode`) VALUES (NULL, '" . $pid . "', '" . $name . "', '0', '0', '0', '0', '" . $email . "', '" . $mobile . "', '" . $password . "','" . $profile . "', '" . $token . "', NULL, 'NO', '1', CURRENT_TIMESTAMP, '" . $refercode . "')";

            if (mysqli_query($conn, $sqlr)) {
                echo "User Added / Updated Successfully...";
            } else {
                echo "Something Went Wrong...";
            }
        }
    }

    if ($insert == '2') {

        $sqlr = "UPDATE `users` SET name = '$name', email = '$email', mobile = '$mobile', password = '$password'  where id='$userid'";

        if (mysqli_query($conn, $sqlr)) {
            echo "User Added / Updated Successfully...";
        } else {
            echo "Something Went Wrong...";
        }
    }
}













$fromuser = $_POST['fromuser'];
$touser = $_POST['touser'];
$toaccount = $_POST['toaccount'];
$amount = $_POST['amount'];
$description = $_POST['description'];

if ($fromuser != '' && $toaccount != '' && $amount != '') {
//$qry = "SELECT usrid, username, oauth FROM usermeta WHERE username='".$username."' AND pass='".$password."' AND status='active'";
    $oldbalnce = mysqli_query($conn, "select * from users where id='$fromuser' ");
    $temp = mysqli_fetch_assoc($oldbalnce);
    if ($toaccount == 1) {
        if ($amount >= $temp['coins']) {

            echo "You do not have sufficient Deposit balance for this transaction";
            exit;
        }
    }
    if ($toaccount == 2) {

        if ($amount >= $temp['winning_amount']) {

            echo "You do not have sufficient Winning Amount for this transaction";
            exit;
        }
    }
    if ($toaccount == 3) {

        if ($amount >= $temp['bonus']) {

            echo "You do not have sufficient bonus balance for this transaction";
            exit;
        }
    }



    $touserinfo = mysqli_query($conn, "select * from users where id='$touser' ");
    $toinfo = mysqli_fetch_assoc($touserinfo);

//echo "Successfully inserted..."	;
    if ($toaccount == 1) {

        $touname = $toinfo['name'];
        $trnstype = 'Coins Transfer to ' . $touname . ' ';
        $ipdaress = $_SERVER['REMOTE_ADDR'];
        $coins = $temp['coins'];
        $newcoins = $coins - $amount;

        $updattrns = "INSERT INTO `trans` (`tid`, `trntype`, `uid`, `amount`,`description`,`closingcoins`, `updatedcoins`,`crdr`, `ipaddress`,`datetime`) VALUES (NULL, '" . $trnstype . "', '" . $fromuser . "', '" . $amount . "', '" . $description . "', '" . $coins . "','" . $newcoins . "', 'Dr','" . $ipdaress . "', CURRENT_TIMESTAMP)";
        $runqury = mysqli_query($conn, $updattrns);

        $frmuname = $temp['name'];
        $trnstype = 'Deposit Transfer from ' . $frmuname . ' ';
        $coins = $toinfo['coins'];
        $newcoins = $coins + $amount;

        $totrnsfer = "INSERT INTO `trans` (`tid`, `trntype`, `uid`, `amount`,`description`,`closingcoins`, `updatedcoins`,`crdr`, `ipaddress`,`datetime`) VALUES (NULL, '" . $trnstype . "', '" . $touser . "', '" . $amount . "', '" . $description . "', '" . $coins . "','" . $newcoins . "', 'Cr','" . $ipdaress . "', CURRENT_TIMESTAMP)";
        $runq = mysqli_query($conn, $totrnsfer);

        $tot = $toinfo['coins'] + $amount;

        $sql = "UPDATE `users` SET coins = '$tot'  where id='$touser'";

        $oldadmin = mysqli_query($conn, "select bonus,coins,winning_amount from users where id='$fromuser' ");
        $temp3 = mysqli_fetch_assoc($oldadmin);

        $totmew = $temp3['coins'] - $amount;

        $newsql = "UPDATE `users` SET coins = '$totmew'  where id='$fromuser'";
        $runq = mysqli_query($conn, $newsql);

        if (mysqli_query($conn, $sql)) {
            $date = date("Y-m-d H:i:s");
            mysqli_query($conn, "INSERT INTO `bonus` (`user_id`, `date`, `bonus_type`,`bonus`) VALUES ('$touser', '$date','Deposit Transfer','$amount')");
            echo "Deposit Amount Successfully Transfered ...";
        }
    } else if ($toaccount == 2) {



        $touname = $toinfo['name'];
        $trnstype = 'Winning Transfer to ' . $touname . ' ';
        $ipdaress = $_SERVER['REMOTE_ADDR'];
        $coins = $temp['winning_amount'];
        $newcoins = $coins - $amount;

        $updattrns = "INSERT INTO `trans` (`tid`, `trntype`, `uid`, `amount`,`description`,`closingcoins`, `updatedcoins`,`crdr`, `ipaddress`,`datetime`) VALUES (NULL, '" . $trnstype . "', '" . $fromuser . "', '" . $amount . "', '" . $description . "', '" . $coins . "','" . $newcoins . "', 'Dr','" . $ipdaress . "', CURRENT_TIMESTAMP)";
        $runqury = mysqli_query($conn, $updattrns);

        $reciveruser = mysqli_query($conn, "select * from users where id='$touser' ");
        $reciver = mysqli_fetch_assoc($reciveruser);

        $frmuname = $temp['name'];
        $trnstype = 'Winning Transfer from ' . $frmuname . ' ';
        $coins = $reciver['winning_amount'];

        $newbonus = $reciver['winning_amount'] + $amount;

        $totrnsfer = "INSERT INTO `trans` (`tid`, `trntype`, `uid`, `amount`,`description`,`closingcoins`, `updatedcoins`,`crdr`, `ipaddress`,`datetime`) VALUES (NULL, '" . $trnstype . "', '" . $touser . "', '" . $amount . "', '" . $description . "', '" . $coins . "','" . $newbonus . "', 'Cr','" . $ipdaress . "', CURRENT_TIMESTAMP)";
        $runq = mysqli_query($conn, $totrnsfer);

        $tot = $newbonus;
        $sqdfdsfl = "UPDATE `users` SET winning_amount = '$tot'  where id='$touser'";

        $runq = mysqli_query($conn, $sqdfdsfl);

        $oldadmin = mysqli_query($conn, "select bonus,coins,winning_amount from users where id='$fromuser' ");
        $temp3 = mysqli_fetch_assoc($oldadmin);
        $date = date("Y-m-d H:i:s");
        mysqli_query($conn, "INSERT INTO `bonus` (`user_id`, `date`, `bonus_type`,`bonus`) VALUES ('$touser', '$date','Winning Transfer','$amount')");

        $tot1 = $temp3['winning_amount'] - $amount;
        $newsql = "UPDATE `users` SET winning_amount = '$tot1'  where id='$fromuser'";
        $runq = mysqli_query($conn, $newsql);

        echo "Winning Amount Successfully Transfered...";
    } else if ($toaccount == 3) {



        $touname = $toinfo['name'];
        $trnstype = 'Bonus Transfer to ' . $touname . ' ';
        $ipdaress = $_SERVER['REMOTE_ADDR'];
        $coins = $temp['bonus'];
        $newcoins = $coins - $amount;

        $updattrns = "INSERT INTO `trans` (`tid`, `trntype`, `uid`, `amount`,`description`,`closingcoins`, `updatedcoins`,`crdr`, `ipaddress`,`datetime`) VALUES (NULL, '" . $trnstype . "', '" . $fromuser . "', '" . $amount . "', '" . $description . "', '" . $coins . "','" . $newcoins . "', 'Dr','" . $ipdaress . "', CURRENT_TIMESTAMP)";
        $runqury = mysqli_query($conn, $updattrns);

        $reciveruser = mysqli_query($conn, "select * from users where id='$touser' ");
        $reciver = mysqli_fetch_assoc($reciveruser);

        $frmuname = $temp['name'];
        $trnstype = 'Bonus Transfer from ' . $frmuname . ' ';
        $coins = $reciver['bonus'];
        $newb = $reciver['bonus'];
        $newbonus = $newb + $amount;

        $totrnsfer = "INSERT INTO `trans` (`tid`, `trntype`, `uid`, `amount`,`description`,`closingcoins`, `updatedcoins`,`crdr`, `ipaddress`,`datetime`) VALUES (NULL, '" . $trnstype . "', '" . $touser . "', '" . $amount . "', '" . $description . "', '" . $coins . "','" . $newbonus . "', 'Cr','" . $ipdaress . "', CURRENT_TIMESTAMP)";
        $runq = mysqli_query($conn, $totrnsfer);

        $tot = $newbonus;
        $sqdfdsfl = "UPDATE `users` SET bonus = '$tot'  where id='$touser'";

        $runq = mysqli_query($conn, $sqdfdsfl);

        $oldadmin = mysqli_query($conn, "select bonus,coins from users where id='$fromuser' ");
        $temp3 = mysqli_fetch_assoc($oldadmin);

        $date = date("Y-m-d H:i:s");
        mysqli_query($conn, "INSERT INTO `bonus` (`user_id`, `date`, `bonus_type`,`bonus`) VALUES ('$touser', '$date','Bonus Transfer','$amount')");

        $tot1 = $temp3['bonus'] - $amount;
        $newsql = "UPDATE `users` SET bonus = '$tot1'  where id='$fromuser'";
        $runq = mysqli_query($conn, $newsql);

        echo "Bonus Amount Successfully Transfered...";
    }
}
?>