<?php
require_once 'header.php';
$limit = 20;  // Number of entries to show in a page.
// Look for a GET variable page if not found default is 1.
if (isset($_GET["page"])) {
    $pn = $_GET["page"];
} else {
    $pn = 1;
};

$start_from = ($pn - 1) * $limit;
$i = $start_from;

$where = $date1 = $date2 = $user_search = '';

if ($_GET['user_search'] != '') {
    $user_search = $_GET['user_search'];
    $where .= " and (mobile = '$user_search')";
}
$useridnew = 0;
$sqlnew = mysqli_query($conn, "SELECT * FROM users WHERE id!=1 $where ORDER BY id DESC LIMIT $start_from, $limit");
$user = mysqli_fetch_assoc($sqlnew);
$useridnew = $user['id'];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User BIO
            <!--<small>advanced tables</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="list_user.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Index</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!--<button type="button" class="btn btn-info"  name="export" id="export_to_excel" onClick="exportexcel();">Export To Excel</button>-->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">&nbsp;</h3>
                        <div class="box-tools">
                            <!--<a href="adduser.php" class="btn btn-primary">Add User</a>-->

                        </div>
                        <!-- /.box-header -->
                        <div class="container-fluid">
                            <div class="row">
                                <form method="get">
                                    <input type="hidden" name="page" value="<?php
//                                    if (isset($_GET['page'])) {
//                                        echo $_GET['page'];
//                                    } else {
echo '1';
//                                    }
?>" />
                                    <div class="col-md-3">
                                        <input type="number" name="user_search" class="form-control" placeholder="Mobile Number" value="<?php
                                    if (isset($_GET['user_search'])) {
                                        echo $_GET['user_search'];
                                    }
?>"  />
                                    </div>

                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>

                                    </div>
                                </form>

                            </div>
                        </div>
<?php if (isset($_GET['user_search'])) {
    if ($useridnew > 0) {
        ?>
                                <section class="content">

                                    <div class="row">
                                        <?php if ($user_details['status'] == '0') { ?>
                                            <div class="col-md-12"><b>Disabled Reason:</b> <?php echo $user_details['disable_reason']; ?></div>
                                        <?php } ?>
                                        <!-- right column -->
                                        <div class="col-md-4">
                                            <div class="box box-info">

                                                <div class="box-header with-border">

                                                    <h3 class="box-title">User Details </h3>

                                                </div>


                                            </div>
                                            <table id="" class="table table-striped table-bordered nowrap" style="width:100%">

                                                <tbody>
                                                    <?php //while ($user = mysqli_fetch_assoc($sqlnew)) {
                                                    ?>
                                                    <tr><td><b>Name</b></td> <td><?php echo $user['name']; ?></td></tr>
                                                    <tr><td><b>Mobile</b></td> <td><?php echo $user['mobile']; ?></td></tr>
                                                    <tr><td><b>Email</b></td> <td><?php echo $user['email']; ?></td></tr>
                                                    <tr><td><b>Last Login</b></td> <td><?php
                                            $daten = $user['lastlogin'];
                                            $date = $user['registerd'];
                                            $timestamp = strtotime($date);

                                            if ($daten) {
                                                $timestamps = strtotime($daten);
                                                echo date("d M Y h:i:s A", $timestamps);
                                            } else {
                                                echo $slot_key = date("d M Y h:i:s A", $timestamp);
                                            }
                                                    ?></td></tr>
                                                    <tr><td><b>Registerd</b></td> <td><?php
                                                    echo $slot_key = date("d M Y h:i:s A", $timestamp);
                                                    ?></td></tr>
                                                    <tr><td><b>Total Deposited Amount</b></td><td><?php
                                                    $s = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) as total from payment where uid = '" . $user['id'] . "' AND trnstype = 'desposite' and status = 'Success'");
                                                    echo mysqli_fetch_assoc($s)['total'];
                                                    ?></td></tr>
                                                            <?php $s = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) as total from payment where uid = '" . $user['id'] . "' AND trnstype = 'withdrawal'"); ?>
                                                    <tr><td><b>Total Withdraw Amount</b></td><td><?php echo mysqli_fetch_assoc($s)['total']; ?></td></tr>
                                                    <?php $s = mysqli_query($conn, "SELECT COALESCE(SUM(wng_amount),0) as total from gamebet where userid = '" . $user['id'] . "' AND losewin = 'winner'"); ?>
                                                    <tr><td><b>Total Winning Amount</b></td><td><?php echo mysqli_fetch_assoc($s)['total']; ?></td></tr>
                                                    <?php $s = mysqli_query($conn, "SELECT COALESCE(COUNT(id),0) as total from gamebet where userid = '" . $user['id'] . "' AND status = 'completed' ");
                                                    ?>
                                                    <tr><td><b>Total Games Played</b></td><td><?php echo mysqli_fetch_assoc($s)['total']; ?></td></tr>
                                                    <?php $s = mysqli_query($conn, "SELECT COALESCE(COUNT(id),0) as total from gamebet where userid = '" . $user['id'] . "' AND losewin = 'winner' ");
                                                    ?>
                                                    <tr><td><b>Total Games Won</b></td><td><?php echo mysqli_fetch_assoc($s)['total']; ?></td></tr>
                                                    <?php $s = mysqli_query($conn, "SELECT COALESCE(COUNT(id),0) as total from gamebet where userid = '" . $user['id'] . "' AND losewin is NULL AND status = 'completed' ");
                                                    ?>
                                                    <tr><td><b>Total Games Lost</b></td><td><?php echo mysqli_fetch_assoc($s)['total']; ?></td></tr>
                                                    <tr><td><b>Real Cash</b></td> <td><?php echo $user['coins']; ?></td></tr>
                                                    <tr><td><b>Bonus</b></td> <td><?php echo $user['bonus']; ?></td></tr>
                                                    <tr><td><b>Referral Code</b></td> <td><?php echo $user['refercode']; ?></td></tr>
                                                    <tr><td><b>Referral Details</b></td> <td><?php
                                            if ($user['refer_id'] > 0) {
                                                $referral_details = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from users where id = '" . $user['refer_id'] . "'"));
                                                echo $referral_details['name'];
                                                echo "(" . $referral_details['mobile'] . ")";
                                            } else {
                                                echo "---";
                                            }
                                                    ?></td></tr>
                                                    <tr><td><b>Total referrals count</b></td> <td><?php
                                                    $sqlnew5 = mysqli_query($conn, "SELECT * FROM users WHERE refer_id = '" . $user['id'] . "'");
                                                    $referrals = mysqli_num_rows($sqlnew5);
                                                    echo $referrals
                                                    ?></td></tr>
                                                    <tr><td><b>Ip Address</b></td> <td><?php echo $user['ip_address']; ?></td></tr>



        <?php //}  ?>




                                                </tbody>

                                            </table>
                                        </div>

                                        <div class="col-md-4">

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



                                        <div class="col-md-4">

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

                                </section><?php } else {
        echo "Invald Mobile Number";
    }
} ?>

                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->


</div>
<?php require_once 'footer.php'; ?>


<script type="text/javascript">

    jQuery(".deleteuser").on('click', (function (e) {
        var checkstr = confirm('are you sure you want to delete this?');
        if (checkstr == true) {
            // do your code
        } else {
            e.preventDefault();
        }
    }));


    $(document).ready(function () {
        var table = $('#example').DataTable({
            responsive: true,
            "pageLength": 50
        });

        new $.fn.dataTable.FixedHeader(table);
    });

</script>
<script>
//    $(function () {
//        $(".datepicker").datepicker({dateFormat: 'yy-mm-dd'});
//    });

    $(document).ready(function () {
        $("#dt1").datepicker({
            dateFormat: "yy-mm-dd",
            onSelect: function () {
                var dt2 = $('#dt2');
                var startDate = $(this).datepicker('getDate');
                //add 30 days to selected date
                startDate.setDate(startDate.getDate() + 180);
                var minDate = $(this).datepicker('getDate');
                var dt2Date = dt2.datepicker('getDate');
                //difference in days. 86400 seconds in day, 1000 ms in second
                var dateDiff = (dt2Date - minDate) / (86400 * 1000);

                //dt2 not set or dt1 date is greater than dt2 date
                if (dt2Date == null || dateDiff < 0) {
                    dt2.datepicker('setDate', minDate);
                }
                //dt1 date is 30 days under dt2 date
                else if (dateDiff > 30) {
//                    dt2.datepicker('setDate', startDate);
                }
                //sets dt2 maxDate to the last day of 30 days window
                dt2.datepicker('option', 'maxDate', startDate);
                //first day which can be selected in dt2 is selected date in dt1
                dt2.datepicker('option', 'minDate', minDate);
            }
        });
        $('#dt2').datepicker({
            dateFormat: "yy-mm-dd",
        });
    });
</script>
</body>
</html>
