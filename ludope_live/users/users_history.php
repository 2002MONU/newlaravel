<?php
require_once 'header.php';

if (isset($_GET["status"])) {

    $status = $_GET["status"];
    $userid = $_GET["userid"];

    if ($status == '1') {
        $sqlr = "UPDATE `users` SET status = '0', disable_reason = '" . $_GET['reason'] . "'  where id='$userid'";
        mysqli_query($conn, $sqlr);
    } else {
        $sqlr = "UPDATE `users` SET status = '1', disable_reason = NULL  where id='$userid'";
        mysqli_query($conn, $sqlr);
    }
    $p = ($_GET["page"] != '') ? $_GET["page"] : 1;
    echo '<script>window.location.href="users_history.php?page=' . $p . '&user_search=' . $_GET["user_search"] . '&date1=' . $_GET["date1"] . '&date2=' . $_GET["date2"] . '"</script>';
//    &order=' . $_GET["order"] . '
}


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
if ($_GET['date1'] != '' && $_GET['date2'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];
    $where = "AND CAST(users.registerd AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date1'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date1'];
    $where = "AND CAST(users.registerd AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date2'] != '') {
    $date1 = $_GET['date2'];
    $date2 = $_GET['date2'];
    $where = "AND CAST(users.registerd AS DATE) BETWEEN '$date1' AND '$date2'";
}
if ($_GET['user_search'] != '') {
    $user_search = $_GET['user_search'];
    $where .= " and (users.name like '%$user_search%' or users.mobile like '%$user_search%' or users.email like '%$user_search%')";
}
if ($_GET['user_status'] != '') {
    $user_status = $_GET['user_status'];
    $where .= " and (status='$user_status')";
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users History
            <!--<small>advanced tables</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="list_user.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Home</a></li>
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
                        <div class="box-tools"><a href="adduser.php" class="btn btn-primary">Add User</a>

                            <!--                            <div class="btn-group text-right"><a class="btn btn-default" href="add_coin.php">Transfer Coin</a></div></div>-->

                        </div>
                        <?php
                        if ($_GET['msg'] == 'user_exist') {
                            ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Already user exists with email or mobile please try with new credentials.
                            </div>
                            <?php
                        }
                        if ($_GET['msg'] == 'error') {
                            ?>
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Something went wrong please try after some time.
                            </div>
                            <?php
                        }
                        if ($_GET['msg'] == 'user_add') {
                            ?>
                            <div class="alert alert-success  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                User credentials added successfully.
                            </div>
                            <?php
                        }
                        if ($_GET['msg'] == 'user_update') {
                            ?>
                            <div class="alert alert-success  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                User credentials updated successfully.
                            </div>
                            <?php
                        }
                        ?>

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
                                        <input type="text" name="user_search" class="form-control" placeholder="Name/Mobile/Email" value="<?php
                                        if (isset($_GET['user_search'])) {
                                            echo $_GET['user_search'];
                                        }
                                        ?>"  />
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="date1" class="form-control" id="dt1" placeholder="Registerd From yyyy-mm-dd" value="<?php
                                        if (isset($_GET['date1'])) {
                                            echo $_GET['date1'];
                                        }
                                        ?>"/>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="date2" class="form-control" id="dt2" placeholder="Registerd To yyyy-mm-dd" value="<?php
                                        if (isset($_GET['date2'])) {
                                            echo $_GET['date2'];
                                        }
                                        ?>"/>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="user_status" class="form-control">
                                            <option value="">Status</option>
                                            <option value="1" <?php
                                            if ($_GET['user_status'] == '1') {
                                                echo "selected";
                                            }
                                            ?>>Enabled</option>
                                            <option value="0" <?php
                                            if ($_GET['user_status'] == '0') {
                                                echo "selected";
                                            }
                                            ?>>Disabled</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                        <a target="_blank" href="export_users_history.php?user_search=<?= $user_search; ?>&date1=<?= $date1; ?>&date2=<?= $date2; ?>" ><div class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</div></a>
                                    </div>
                                </form>
                                <?php
                                $sqlnew110 = mysqli_query($conn, "SELECT count(id) as total FROM users WHERE id!=1 and otp_verified='verified' and status = '1' $where ");
                                ?>
                                <div class="col-md-4">
                                    <h4>Total Enabled Users: <?php echo mysqli_fetch_assoc($sqlnew110)['total']; ?></h4>
                                </div>
                                <?php
                                $sqlnew110 = mysqli_query($conn, "SELECT count(id) as total FROM users WHERE id!=1 and status = '0' $where ");
                                ?>
                                <div class="col-md-4">
                                    <h4>Total Disabled Users: <?php echo mysqli_fetch_assoc($sqlnew110)['total']; ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="box-body table-responsive">
                            <table id="" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>User Details</th>
                                        <th>Total Deposited Amount</th>
                                        <th>Total Withdraw Amount</th>
                                        <th>Total Winning Amount</th>
                                        <th>Total Games Played</th>
                                        <th>Registerd</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
//                                echo "SELECT * FROM users WHERE id!=1 $where ORDER BY id DESC LIMIT $start_from, $limit";
                                    $sqlnew = mysqli_query($conn, "SELECT * FROM users WHERE id!=1 and otp_verified='verified' $where ORDER BY id DESC LIMIT $start_from, $limit");
//$sql = "SELECT COALESCE(g.total_games,0) as total_games,COALESCE(gw.total_winning,0) as total_winning,COALESCE(wd.total_withdrawal,0) as total_withdrawal,COALESCE(d.total_desposite,0) as total_desposite, users.* FROM users LEFT JOIN (SELECT userid, COUNT(id) as total_games from gamebet where status = 'completed' GROUP BY gamebet.userid) g on g.userid = users.id LEFT JOIN (SELECT userid,SUM(wng_amount) as total_winning from gamebet where losewin = 'winner') gw on gw.userid = users.id LEFT JOIN (SELECT uid,SUM(amount) as total_withdrawal from payment where trnstype = 'withdrawal') wd on wd.uid = users.id LEFT JOIN (SELECT uid,SUM(amount) as total_desposite from payment where trnstype = 'desposite' and status = 'Success') d on d.uid = users.id WHERE users.id!=1 $where $order_by LIMIT $start_from, $limit";
                                    //$sqlnew = mysqli_query($conn, $sql);
                                    while ($user = mysqli_fetch_assoc($sqlnew)) {
                                        ?>
                                        <tr>
                                            <td><?= ++$i; ?></td>
                                            <td><?php echo $user['name']; ?></td>
                                            <td><?php echo $user['mobile']; ?><br><?php echo $user['email']; ?></td>
                                            <td><?php
                                                $deposit_amt = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) as total from payment where uid = '" . $user['id'] . "' AND trnstype = 'deposit' and status = 'success'");
                                                echo mysqli_fetch_assoc($deposit_amt)['total'];
                                                ?></td>
                                            <?php $s = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) as total from payment where uid = '" . $user['id'] . "' AND trnstype = 'withdrawal' AND status='approved'"); ?>
                                            <td><?php echo mysqli_fetch_assoc($s)['total']; ?></td>
                                            <?php $s = mysqli_query($conn, "SELECT COALESCE(SUM(wng_amount),0) as total from gamebet where userid = '" . $user['id'] . "' AND losewin = 'winner'"); ?>
                                            <td><?php echo mysqli_fetch_assoc($s)['total']; ?></td>
                                            <?php $s = mysqli_query($conn, "SELECT COALESCE(COUNT(id),0) as total from gamebet where userid = '" . $user['id'] . "' AND status = 'completed' "); ?>
                                            <td><?php echo mysqli_fetch_assoc($s)['total']; ?></td>
                                            <td><?php
                                                echo $slot_key = date("d M Y h:i:s A", strtotime($user['registerd']));
                                                ?></td>
                                            <?php if ($user['status'] == '1') { ?>
                                                <td> <div class="btn-group text-right"><a class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $user['id']; ?>" role="button">Enabled</a> </div>
                                                    <!-- Modal -->
                                                    <div id="myModal<?php echo $user['id']; ?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Disable Reason</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="get" action="users_history.php">
                                                                        <input type="hidden" value="<?php echo $user['id']; ?>" name="userid" />
                                                                        <input type="hidden" value="<?php echo $user['status']; ?>" name="status" />
                                                                        <input type="hidden" value="<?= $_GET["page"]; ?>" name="page" />
                                                                        <input type="hidden" value="<?= $user_search ?>" name="user_search" />
                                                                        <input type="hidden" value="<?= $date1 ?>" name="date1" />
                                                                        <input type="hidden" value="<?= $date2 ?>" name="date2" />
                                                                        <!--<input type="hidden" value="<?= $order ?>" name="order" />-->
                                                                        <textarea cols="5" name="reason" class="form-control" placeholder="Disable Reason"></textarea>
                                                                        <input type="submit" class="btn btn-danger" />
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </td>
                                            <?php } else { ?>
                                                <td> <div class="btn-group text-right"><a class="btn btn-danger"  href="users_history.php?userid=<?php echo $user['id']; ?>&status=<?php echo $user['status']; ?>&page=<?= $_GET["page"]; ?>&user_search=<?= $user_search ?>&date1=<?= $date1 ?>&date2=<?= $date2 ?>&order=<?= $order ?>">Disabled</a> </div>

                                                </td>
                                            <?php } ?>

                                        </tr>
                                    <?php } ?>




                                </tbody>
    <!-- <tfoot>
    <tr>
    <th>Rendering engine</th>
    <th>Browser</th>
    <th>Platform(s)</th>
    <th>Engine version</th>
    <th>CSS grade</th>
    </tr>
    </tfoot>-->
                            </table>
                        </div>

                        <ul class="pagination">
                            <?php
                            //$sqla = "SELECT COUNT(users.id) FROM users LEFT JOIN (SELECT userid, COUNT(id) as total_games from gamebet where status = 'completed' GROUP BY gamebet.userid) g on g.userid = users.id LEFT JOIN (SELECT userid,SUM(wng_amount) as total_winning from gamebet where losewin = 'winner') gw on gw.userid = users.id LEFT JOIN (SELECT uid,SUM(amount) as total_withdrawal from payment where trnstype = 'withdrawal') wd on wd.uid = users.id LEFT JOIN (SELECT uid,SUM(amount) as total_desposite from payment where trnstype = 'desposite') d on d.uid = users.id WHERE users.id!=1 $where";

                            $sqla = "SELECT COUNT(*) FROM users where id != 1 $where";
                            $rs_result = mysqli_query($conn, $sqla);
                            $row = mysqli_fetch_row($rs_result);
                            $total_records = $row[0];

// Number of pages required.
                            $perPage = 20; // Number of items per page
                            $totalPages = ceil($total_records / $perPage); // Calculate total number of pages
                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Get current page, default is 1
                            // Determine the range of pages to display
                            $range = 3; // Number of page links to show on each side of current page

                            $start = max(1, $currentPage - $range);
                            $end = min($totalPages, $currentPage + $range);

                            // Display "Previous" link if not on the first page
                            if ($currentPage > 1) {
                                echo '<li><a href="?page=' . ($currentPage - 1) . '&user_search=' . $user_search . '&date1=' . $date1 . '&date2=' . $date2 . '&status=' . $status . '">Previous</a></li>';
                            }

                            // Display page links
                            for ($i = $start; $i <= $end; $i++) {
                                if ($i == $currentPage) {
                                    echo '<li class="active"><a>' . $i . '</a></li>';
                                } else {
                                    echo '<li><a href="?page=' . $i . '&user_search=' . $user_search . '&date1=' . $date1 . '&date2=' . $date2 . '&status=' . $status . '">' . $i . '</a></li>';
                                }
                            }

                            // Display "Next" link if not on the last page
                            if ($currentPage < $totalPages) {
                                echo '<li><a href="?page=' . ($currentPage + 1) . '&user_search=' . $user_search . '&date1=' . $date1 . '&date2=' . $date2 . '&status=' . $status . '">Next</a></li>';
                            }
                            ?>
                        </ul>


                        <!-- /.box-body -->
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
