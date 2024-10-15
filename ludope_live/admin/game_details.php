<?php require_once 'header.php'; ?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 837px;">

    <!-- Content Header (Page header) -->

    <!-- Main content -->

    <section class="content">
        <h1>
            Game Details
            <!--<small>advanced tables</small>-->
        </h1>
        <div class="row">

            <!-- right column -->

            <div class="col-md-12">

                <!-- Horizontal Form -->

                <div class="box box-info">



                    <!-- /.box-header -->

                    <!-- form start -->


                    <section class="content">
                        <!-- Info boxes -->


                        <!--                        <div class="box box-info">








                                                </div>-->

                        <div class="box-body">

                            <div class="table-responsive" style="padding-top: 20px">
                                <table id="example1" class="table table-bordered table-striped  table-hover">
                                    <thead>
                                        <tr>
<!--                                            <th>Trans No.</th>-->
                                            <th>#</th>
                                            <th>Participants</th>
                                            <th>Amount</th>



                                            <th>Result</th>
                                            <th>Commission</th>
                                            <th>Winning amount</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
//                                            echo "select gamebet.* from gamebet $where AND gamebet.userid != 0 GROUP BY gamebet.gameid ORDER BY gamebet.id DESC";
                                        $touserinfo = mysqli_query($conn, "select gamebet.* from gamebet WHERE gameid = '" . $_GET['gameid'] . "' and losewin='winner' LIMIT 1");

//                                            echo mysqli_num_rows(mysqli_query($conn, "select gamebet.* from gamebet $where AND gamebet.userid != 0 GROUP BY gamebet.gameid ORDER BY gamebet.id DESC"));
                                        ?>
                                        <?php
                                        $k = 1;
                                        while ($user = mysqli_fetch_assoc($touserinfo)) {
                                            $gid = $user['gameid'];
                                            ?>

                                            <tr>
    <!--                                                <td><?php echo $user['id']; ?></td>-->
                                                <td><?php echo $k++; ?></td>
                                                <td>
                                                    <?php
                                                    $s = mysqli_query($conn, "SELECT userid, amount FROM gamebet WHERE gameid='" . $gid . "' and userid != '0'");
                                                    $real_players_count = mysqli_num_rows($s);
                                                    while ($row = mysqli_fetch_assoc($s)) {
                                                        if ($row['userid'] == '0' || $row['userid'] == 0) {
                                                            echo 'Computer<br>';
                                                        } else {
                                                            $userid = $row['userid'];
                                                            $uinfo = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
                                                            $userinfo = mysqli_fetch_assoc($uinfo);
                                                            echo $userinfo['name'] . '-' . $userinfo['mobile'] . '<br>';
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    $table = $user['tabletype'];
                                                    if ($table == '12' || $table == '22') {
                                                        $bot_count = 2 - $real_players_count;
                                                    } if ($table == '14' || $table == '24') {
                                                        $bot_count = 4 - $real_players_count;
                                                    }
                                                    $s = mysqli_query($conn, "SELECT userid, amount FROM gamebet WHERE gameid='" . $gid . "' and userid = '0'");
                                                    $i = 1;
                                                    while ($row = mysqli_fetch_assoc($s)) {
                                                        if ($i <= $bot_count) {
                                                            echo 'Computer<br>';
                                                        }
                                                        $i++;
                                                    }
                                                    ?>
                                                    <?php /* echo $userinfo['name']; ?> - <?php echo $userinfo['mobile']; */ ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $s = mysqli_query($conn, "SELECT userid,amount FROM gamebet WHERE gameid='" . $gid . "' and userid != '0'");
                                                    while ($row = mysqli_fetch_assoc($s)) {
                                                        if ($row['userid'] == '0' || $row['userid'] == 0) {
                                                            echo '0<br>';
                                                        } else {
                                                            echo $row['amount'] . '<br>';
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    $table = $user['tabletype'];
                                                    if ($table == '12' || $table == '22') {
                                                        $bot_count = 2 - $real_players_count;
                                                    } if ($table == '14' || $table == '24') {
                                                        $bot_count = 4 - $real_players_count;
                                                    }
                                                    $s = mysqli_query($conn, "SELECT userid, amount FROM gamebet WHERE gameid='" . $gid . "' and userid = '0'");
                                                    $i = 1;
                                                    while ($row = mysqli_fetch_assoc($s)) {
                                                        if ($i <= $bot_count) {
                                                            echo '0<br>';
                                                        }
                                                        $i++;
                                                    }
                                                    ?>
                                                    <?php //echo $user['amount'];    ?>
                                                </td>

                                                <td><?php
                                                    //echo "SELECT userid FROM gamebet WHERE gameid='" . $gid . "' and userid!=0 and losewin='winner'";
                                                    $s1 = mysqli_query($conn, "SELECT userid FROM gamebet WHERE gameid='" . $gid . "' and userid!=0 and losewin='winner' order by wng_amount desc");
                                                    $count = mysqli_num_rows($s1);
                                                    if ($count > 0) {
                                                        while ($row1 = mysqli_fetch_assoc($s1)) {
                                                            $userid1 = $row1['userid'];
                                                            $uinfo = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid1 . "'");
                                                            $userinfo = mysqli_fetch_assoc($uinfo);
                                                            echo $userinfo['name'];
                                                            echo "<br>";
                                                        }
                                                    } else {
                                                        echo 'Computer';
                                                    }

                                                    //echo ($user['losewin'] != '') ? $user['losewin'] : 'looser';
                                                    ?></td>



                                                <td><?php
                                                    $s1 = mysqli_query($conn, "SELECT commission_amount FROM gamebet WHERE gameid='" . $gid . "' and userid!=0 and losewin='winner' and commission_amount>0");
                                                    $count = mysqli_num_rows($s1);
                                                    if ($count > 0) {
                                                        $row1 = mysqli_fetch_assoc($s1);
                                                        $c_a = $row1['commission_amount'];
                                                        $s1 = mysqli_query($conn, "SELECT commission_amount FROM gamebet WHERE gameid='" . $gid . "'");
                                                        $count1 = mysqli_num_rows($s1);
                                                        $s1 = mysqli_query($conn, "SELECT commission_amount FROM gamebet WHERE gameid='" . $gid . "' and userid!=0");
                                                        $count = mysqli_num_rows($s1);
                                                        $each_commi = $c_a / $count1;
                                                        echo ($each_commi * $count);
                                                    } else {
                                                        $s1 = mysqli_query($conn, "SELECT SUM(amount) as amount FROM gamebet WHERE gameid='" . $gid . "'");
                                                        $row1 = mysqli_fetch_assoc($s1);
                                                        echo "0";
                                                    }
                                                    //echo $user['commission_amount'];
                                                    ?></td>
                                                <td><?php
                                                    $s1 = mysqli_query($conn, "SELECT wng_amount FROM gamebet WHERE gameid='" . $gid . "' and userid!=0 and losewin='winner' order by `wng_amount` desc");
                                                    $count = mysqli_num_rows($s1);
                                                    if ($count > 0) {
                                                        while ($row1 = mysqli_fetch_assoc($s1)) {
                                                            echo $row1['wng_amount'];
                                                            echo "<br>";
                                                        }
                                                    } else {
                                                        echo '0';
                                                    }
                                                    //echo $user['wng_amount'];
                                                    ?></td>

                                            <?php } ?>
                                        </tr>

                                    </tbody>
                                </table>







                            </div>

                        </div>



                    </section>
                </div>

                <!-- /.box -->

            </div>

            <!--/.col (right) -->

        </div>

        <!-- /.row -->

    </section>

    <!-- /.content -->

</div>
<?php require_once 'footer.php'; ?>


</body>
</html>
