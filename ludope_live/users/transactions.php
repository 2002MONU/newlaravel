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
if ($_GET['date1'] != '' && $_GET['date2'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];
    $where = "AND CAST(payment.datetime AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date1'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date1'];
    $where = "AND CAST(payment.datetime AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date2'] != '') {
    $date1 = $_GET['date2'];
    $date2 = $_GET['date2'];
    $where = "AND CAST(payment.datetime AS DATE) BETWEEN '$date1' AND '$date2'";
}
if ($_GET['user_search'] != '') {
    $user_search = $_GET['user_search'];
    $sql_no = mysqli_query($conn, "select * from users where mobile='" . $user_search . "'");
    $user = mysqli_fetch_array($sql_no);
    $where .= " and (uid='" . $user['id'] . "')";
}
if ($_GET['user_status'] != '') {
    $user_status = $_GET['user_status'];
    $where .= " and (status='$user_status')";
}
?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 837px;">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Transactions <a href="transactions_export.php" ><div class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</div></a>


        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="#">User</a></li>

            <li class="active">Transactions</li>

        </ol>

    </section>



    <!-- Main content -->

    <section class="content">

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
                    <input type="text" name="user_search" class="form-control" placeholder="Mobile" value="<?php
                    if (isset($_GET['user_search'])) {
                        echo $_GET['user_search'];
                    }
                    ?>"  />
                </div>
                <div class="col-md-2">
                    <input type="text" name="date1" class="form-control" id="dt1" placeholder="From yyyy-mm-dd" value="<?php
                    if (isset($_GET['date1'])) {
                        echo $_GET['date1'];
                    }
                    ?>"/>
                </div>
                <div class="col-md-2">
                    <input type="text" name="date2" class="form-control" id="dt2" placeholder="To yyyy-mm-dd" value="<?php
                    if (isset($_GET['date2'])) {
                        echo $_GET['date2'];
                    }
                    ?>"/>
                </div>
                <!--                <div class="col-md-2">
                                    <select name="user_status" class="form-control">
                                        <option value="">Status</option>
                                        <option value="1">Su</option>
                                    </select>
                                </div>-->

                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                    <a target="_blank" href="transactions_export.php?user_search=<?= $user_search; ?>&date1=<?= $date1; ?>&date2=<?= $date2; ?>" ><div class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</div></a>
                </div>
            </form>
            <a href="transactions.php"><button type="submit" class="btn btn-primary">Reset</button></a>

            <br>
            <!-- right column -->

            <div class="col-md-12">

                <!-- Horizontal Form -->

                <div class="box box-info">



                    <!-- /.box-header -->

                    <!-- form start -->


                    <section class="content">
                        <!-- Info boxes -->




                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered   table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th> Order Id</th>
                                            <th>Amount</th>
                                            <th>Date</th>

                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $touserinfo = mysqli_query($conn, "select * from payment where trnstype='deposit' AND (status = 'failed' OR status = 'success') $where order by pid DESC LIMIT $start_from, $limit");

                                        while ($user = mysqli_fetch_assoc($touserinfo)) {
                                            $userid = $user['uid'];
                                            $pid = $user['pid'];
                                            $uinfo = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
                                            $userinfo = mysqli_fetch_assoc($uinfo);

                                            $bank = mysqli_query($conn, "SELECT * FROM kyc WHERE user_id='" . $userid . "'");
                                            $bankinfo = mysqli_fetch_assoc($bank);
                                            ?>

                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?php echo $userinfo['name']; ?> - <?php echo $userinfo['mobile']; ?></td>
                                                <td><?php echo $user['orderid']; ?></td>
                                                <td><?php echo $user['amount']; ?></td>
                                                <td>

                                                    <?php
                                                    $date = $user['datetime'];

                                                    $timestamp = strtotime($date);

                                                    echo $slot_key = date("d M Y h:i:s A", $timestamp);
                                                    ?></td>

                                                <td><?php echo $status = $user['status']; ?></td>





                                            </tr>
                                            <?php
                                        }if ($i == 1) {
                                            echo "<tr><td colspan='8'>No Records</td></tr>";
                                        }
                                        ?>
                                    </tbody>



                                </table>

                            </div>
                            <ul class="pagination">
                                <?php
                                //$sqla = "SELECT COUNT(users.id) FROM users LEFT JOIN (SELECT userid, COUNT(id) as total_games from gamebet where status = 'completed' GROUP BY gamebet.userid) g on g.userid = users.id LEFT JOIN (SELECT userid,SUM(wng_amount) as total_winning from gamebet where losewin = 'winner') gw on gw.userid = users.id LEFT JOIN (SELECT uid,SUM(amount) as total_withdrawal from payment where trnstype = 'withdrawal') wd on wd.uid = users.id LEFT JOIN (SELECT uid,SUM(amount) as total_desposite from payment where trnstype = 'desposite') d on d.uid = users.id WHERE users.id!=1 $where";

                                $sqla = "SELECT COUNT(*) FROM payment";
                                $rs_result = mysqli_query($conn, $sqla);
                                $row = mysqli_fetch_row($rs_result);
                                $total_records = $row[0];

                                $total_pages = ceil($total_records / $limit);
                                $perPage = 20; // Number of items per page
                                $totalPages = ceil(1000 / $perPage); // Calculate total number of pages
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


<!-- /.content-wrapper -->
</body>

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

</html>

