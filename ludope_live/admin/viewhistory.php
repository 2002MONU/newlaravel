<?php
require_once 'header.php';
$useridnew = $_GET['userid'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $useridnew . "'");
$user_details = mysqli_fetch_assoc($sql);
?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 837px;">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1> User History </h1>

        <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="#">User</a></li>

            <li class="active">History</li>

        </ol>

    </section>



    <!-- Main content -->

    <section class="content">

        <div class="row">
            <?php if ($user_details['status'] == '0') { ?>
                <div class="col-md-12"><b>Disabled Reason:</b> <?php echo $user_details['disable_reason']; ?></div>
            <?php } ?>
            <!-- right column -->

            <div class="col-md-5">

                <!-- Horizontal Form -->

                <div class="box box-info">

                    <div class="box-header with-border">

                        <h3 class="box-title">User Game History </h3>

                    </div>


                </div>

                <!-- /.box -->

                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped  table-hover">
                        <thead>
                            <tr>


                                <th>Amount</th>
                                <th> Date and time</th>
                                <th> Table</th>
                                <th> Win / Lose</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $touserinfo = mysqli_query($conn, "select * from gamebet where userid='" . $useridnew . "' ORDER BY id DESC");
                            ?>
                            <?php while ($user = mysqli_fetch_assoc($touserinfo)) {
                                ?>

                                <tr>


                                    <td>
                                        <?php
                                        $losewin = $user['losewin'];
                                        if ($losewin == 'winner') {
                                            echo $user['wng_amount'];
                                        } else {
                                            echo '-' . $user['amount'];
                                        }
                                        ?>
                                        <?php //echo $user['wng_amount']; ?></td>
                                    <td><?php
                                        $date = $user['gtime'];

                                        $timestamp = strtotime($date);


                                        echo $slot_key = date("d M Y h:i:s A", $timestamp);
                                        ?></td>
                                    <td><?php
                                        $table = $user['tabletype'];
                                        if ($table == '12') {
                                            echo 'Normal - 2 Player';
                                        } if ($table == '22') {
                                            echo 'Private - 2 Player ';
                                        } if ($table == '14') {
                                            echo 'Normal - 4 Player';
                                        } if ($table == '24') {
                                            echo 'Private - 4 Player';
                                        }
                                        ?></td>

                                    <td><?php
                                        $losewin = $user['losewin'];
                                        if ($losewin == 'winner') {
                                            echo 'Winner';
                                        } else {
                                            echo 'Loser';
                                        }
                                        ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>







                </div>

                <!--/.col (right) -->

            </div>



            <div class="col-md-7">

                <!-- Horizontal Form -->

                <div class="box box-info">

                    <div class="box-header with-border">

                        <h3 class="box-title">User Payment History </h3>

                    </div>


                </div>

                <!-- /.box -->

                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped  table-hover">
                        <thead>
                            <tr>

                                <th> Order Id</th>
                                <th>Amount</th>
                                <th>Withdrawal/ Deposit</th>
                                <th>Request Date</th>
                                <th>Trns Into</th>
                                <th> Status</th>
                                <th>  </th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $touserinfo = mysqli_query($conn, "select * from payment where uid='" . $useridnew . "' order by pid DESC");
                            ?>
                            <?php
                            while ($user = mysqli_fetch_assoc($touserinfo)) {
                                $userid = $user['uid'];
                                $pid = $user['pid'];
                                ?>

                                <tr>

                                    <td><?php echo $user['orderid']; ?></td>
                                    <td><?php echo $user['amount']; ?></td>

                                    <td><?php
                                        if ($user['trnstype'] == 'withdrawal') {
                                            echo 'withdrawal';
                                        } else {
                                            echo 'Deposit';
                                        }
                                        ?></td>


                                    <td>

                                        <?php
                                        $date = $user['datetime'];

                                        $timestamp = strtotime($date);


                                        echo $slot_key = date("d M Y h:i:s A", $timestamp);
                                        ?></td>
                                    <td><a href="kyc.php?kycid=<?php echo $userid; ?>&getway=<?php echo $user['getway']; ?>"><?php echo $user['getway']; ?></a></td>
                                    <td><?php echo $status = $user['status']; ?></td>

                                                            <!--                                    <td>
                                                                                                    <div class="btn-group">

                                    <?php if ($status == 'approved') { ?>
                                                                                                                                                                        <button type="button" class="btn btn-success">Completed</button>
                                    <?php } else { ?>
                                                                                                                                                                        <button type="button" class="btn btn-warning">Pending</button>

                                                                                                                                                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">

                                                                                                                                                                            <span class="caret"></span>

                                                                                                                                                                            <span class="sr-only">Toggle Dropdown</span>

                                                                                                                                                                        </button>
                                                                                                                                                                        <ul class="dropdown-menu" role="menu">

                                                                                                                                                                            <li><a href="withdrawstatus.php?orderid=<?php echo $user['orderid']; ?>&userid=<?php echo $userid; ?>&status=approved">approved</a></li>
                                                                                                                                                                            <li class="divider"></li>
                                                                                                                                                                            <li><a href="withdrawstatus.php?orderid=<?php echo $user['orderid']; ?>&userid=<?php echo $userid; ?>&status=Declined&amount=<?php echo $user['amount']; ?>">Declined</a></li>
                                                                                                                                                                            <li class="divider"></li>
                                                                                                                                                                            <li><a href="withdrawstatus.php?orderid=<?php echo $user['orderid']; ?>&userid=<?php echo $userid; ?>&status=Remove&pid=<?php echo $pid; ?>">Remove</a></li>
                                                                                                                                                                        </ul>

                                    <?php } ?>
                                                                                                    </div>










                                                                                                </td>-->



                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                </div>


            </div>

        </div>
            <!-- /.row -->

    </section>

    <!-- /.content -->

</div>
<?php require_once 'footer.php'; ?>
</body>
</html>
