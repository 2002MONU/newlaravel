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
$i = 0;

$where = $date1 = $date2 = $user_search = '';

if ($_GET['user_search'] != '') {
    $user_search = $_GET['user_search'];
    $where .= " and (mobile = '$user_search')";
}
$useridnew = 0;
$sqlnew = mysqli_query($conn, "SELECT * FROM users WHERE id!=1 and otp_verified='verified' $where ORDER BY id DESC LIMIT $start_from, $limit");
$user = mysqli_fetch_assoc($sqlnew);
$useridnew = $user['id'];
$month_start = date('Y-m-01 00:00:01');
$month_end = date('Y-m-t 23:59:59');
$today_start = date('Y-m-d 00:00:01');
$today_end = date('Y-m-d 23:59:59');
$sqlnew5 = mysqli_query($conn, "SELECT * FROM users WHERE refer_id > 0");
$total_referral = mysqli_num_rows($sqlnew5);

$sqlnew5 = mysqli_query($conn, "SELECT * FROM users WHERE refer_id > 0 and otp_verified='verified' AND (registerd BETWEEN '$today_start' AND '$today_end')");
$today_referral = mysqli_num_rows($sqlnew5);

$sqlnew5 = mysqli_query($conn, "SELECT * FROM users WHERE refer_id > 0 and otp_verified='verified' AND (registerd BETWEEN '$month_start' AND '$month_end')");
$this_month_referral = mysqli_num_rows($sqlnew5);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Referral History
            <!--<small>advanced tables</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="list_user.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Index</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="first-card">
            <div class="row">

                <div class="col-md-3">
                    <div class="inner-div third-color">
                        <div class="icon-div">
                            <i class="far fa-handshake"></i>
                        </div>
                        <div class="content-div">
                            <a href="referrals.php"><p>Total referral </p>
                                <h3 ><?= $total_referral ?></h3></a>
                        </div>
                    </div><!--inner-div-->
                </div>

                <div class="col-md-3">
                    <div class="inner-div third-color">
                        <div class="icon-div">
                            <i class="far fa-handshake"></i>
                        </div>
                        <div class="content-div">
                            <a href="referrals.php?referral_type=today"><p>Today referral </p>
                                <h3 ><?= $today_referral ?></h3></a>
                        </div>
                    </div><!--inner-div-->
                </div>

                <div class="col-md-3">
                    <div class="inner-div third-color">
                        <div class="icon-div">
                            <i class="far fa-handshake"></i>
                        </div>
                        <div class="content-div">
                            <a href="referrals.php?referral_type=this_month"><p>This Month referral </p>
                                <h3 ><?= $this_month_referral ?></h3></a>
                        </div>
                    </div><!--inner-div-->
                </div>
            </div></div><div class="row">
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
                        <?php
                        if (isset($_GET['user_search'])) {
                            if (!empty($_GET['user_search'])) {
                                $sqlnew = mysqli_query($conn, "SELECT * FROM users WHERE refer_id=$useridnew ORDER BY id DESC");
                            } else {
                                $sqlnew = $sqlnew = mysqli_query($conn, "SELECT * FROM users WHERE id!=1 and otp_verified='verified' $where ORDER BY id DESC LIMIT $start_from, $limit");
                            }
                        } else {

                            $month_start = date('Y-m-01 00:00:01');
                            $month_end = date('Y-m-t 23:59:59');
                            $today_start = date('Y-m-d 00:00:01');
                            $today_end = date('Y-m-d 23:59:59');
                            if ($_GET['referral_type'] == 'today') {
                                $sqlnew = mysqli_query($conn, "SELECT * FROM users WHERE refer_id>0 and (registerd BETWEEN '$today_start' AND '$today_end') ORDER BY id DESC");
                            } else if ($_GET['referral_type'] == 'this_month') {
                                $sqlnew = mysqli_query($conn, "SELECT * FROM users WHERE refer_id>0 and (registerd BETWEEN '$month_start' AND '$month_end') ORDER BY id DESC");
                            } else {
                                $sqlnew = mysqli_query($conn, "SELECT * FROM users WHERE refer_id>0 ORDER BY id DESC LIMIT $start_from, $limit");
                            }
                        }
                        ?>
                        <section class="content">

                            <div class="row">

                                <!-- right column -->
                                <div class="col-md-12">
                                    <div class="box box-info">

                                        <div class="box-header with-border">

                                            <h3 class="box-title"><?php
                                                if ($_GET['referral_type'] == 'today') {
                                                    echo "Today";
                                                }
                                                if ($_GET['referral_type'] == 'this_month') {
                                                    echo "This Month";
                                                }
                                                if ($_GET['referral_type'] == '') {
                                                    echo "Total";
                                                }
                                                ?> Referral User Details </h3>

                                        </div>
                                        <div class="box-body table-responsive">
                                            <table id="" class="table table-striped table-bordered nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Mobile</th>
                                                        <th>Referral amount</th>
                                                        <th>Email</th>
                                                        <th>Registered</th>
                                                        <th>Referral</th>
                                                        <th>Referee amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($user = mysqli_fetch_assoc($sqlnew)) {
                                                        $det = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user['refer_id'] . "'"));
                                                        $referrer = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM refered WHERE uid='" . $user['id'] . "'"));
                                                        ?>
                                                        <tr>
                                                            <td><?= ++$i; ?></td>
                                                            <td><?php echo $user['name']; ?></td>
                                                            <td><?php echo $user['mobile']; ?></td>
                                                            <td><?php echo $referrer['referee_amount'] ?></td>
                                                            <td><?php echo $user['email']; ?></td>
                                                            <td><?php echo date("d M Y h:i:s A", strtotime($user['registerd']));
                                                        ?></td>
                                                            <td><?php echo $det['mobile']; ?></td>
                                                            <td><?php echo $referrer['referrer_amount'] ?></td>

                                                        </tr>
                                                        <?php
                                                    }if ($i == 0) {
                                                        echo "<tr><td colspan='6'>No Records</td></tr>";
                                                    }
                                                    ?>




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
                                            $sqla = "SELECT COUNT(*) FROM users where id != 1 $where";
                                            $rs_result = mysqli_query($conn, $sqla);
                                            $row = mysqli_fetch_row($rs_result);
                                            $total_records = $row[0];

                                            $total_pages = ceil($total_records / $limit);
                                            $perPage = 20; // Number of items per page
                                            $totalPages = ceil($total_records / $perPage); // Calculate total number of pages
                                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Get current page, default is 1
                                            // Determine the range of pages to display
                                            $range = 3; // Number of page links to show on each side of current page

                                            $start = max(1, $currentPage - $range);
                                            $end = min($totalPages, $currentPage + $range);

                                            // Display "Previous" link if not on the first page
                                            if ($currentPage > 1) {
                                                echo '<li><a href="?page=' . ($currentPage - 1) . '&user_search=' . $user_search . '&date1=' . $date1 . '&date2=' . $date2 . '">Previous</a></li>';
                                            }

                                            // Display page links
                                            for ($i = $start; $i <= $end; $i++) {
                                                if ($i == $currentPage) {
                                                    echo '<li class="active"><a>' . $i . '</a></li>';
                                                } else {
                                                    echo '<li><a href="?page=' . $i . '&user_search=' . $user_search . '&date1=' . $date1 . '&date2=' . $date2 . '">' . $i . '</a></li>';
                                                }
                                            }

                                            // Display "Next" link if not on the last page
                                            if ($currentPage < $totalPages) {
                                                echo '<li><a href="?page=' . ($currentPage + 1) . '&user_search=' . $user_search . '&date1=' . $date1 . '&date2=' . $date2 . '">Next</a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>

                                </div>


                            </div>
                            <!-- /.row -->

                        </section><?php ?>

                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
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
