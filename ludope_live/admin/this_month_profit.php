<?php
require_once 'header.php';
$month_start = date('Y-m-01 00:00:01');
$month_end = date('Y-m-t 23:59:59');
$today_start = date('Y-m-d 00:00:01');
$today_end = date('Y-m-d 23:59:59');

$limit = 20;  // Number of entries to show in a page.
// Look for a GET variable page if not found default is 1.
if (isset($_GET["page"])) {
    $pn = $_GET["page"];
} else {
    $pn = 1;
};

$start_from = ($pn - 1) * $limit;
$i = $start_from;
?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 837px;">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            This Month Profit <a href="export.php?type=profit&export=this_month" ><div class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</div></a>


        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>


            <li class="active">This Month Profit</li>

        </ol>

    </section>



    <!-- Main content -->

    <section class="content">

        <div class="row">

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
                                <table id="" class="table table-striped table-bordered nowrap" style="width:100%" border="1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Name</th>
                                            <th>User Mobile</th>
                                            <?php if ($_GET['type'] == 'earning') { ?>
                                                <th>Winning Amount</th><?php } ?>
                                            <?php if ($_GET['type'] == 'profit') { ?><th>Commission Amount</th><?php } ?>
                                            <th>IpAddress</th>
                                            <th>Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($_GET['export'] == 'today') {
                                            $sqlnew = mysqli_query($conn, "SELECT * FROM gamebet WHERE status = 'completed' AND (gtime BETWEEN '$today_start' AND '$today_end') and wng_amount>0 LIMIT $start_from, $limit");
                                        } else {

                                            $sqlnew = mysqli_query($conn, "SELECT * FROM gamebet WHERE status = 'completed' AND (gtime BETWEEN '$month_start' AND '$month_end') and wng_amount>0 LIMIT $start_from, $limit");
                                        }while ($user = mysqli_fetch_assoc($sqlnew)) {
                                            $det = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user['userid'] . "'"));
                                            ?>
                                            <tr>
                                                <td><?= ++$i; ?></td>
                                                <td><?php echo $det['name']; ?></td>
                                                <td><?php echo $det['mobile']; ?></td>
                                                <?php if ($_GET['type'] == 'earning') { ?> <td><?php echo $user['wng_amount']; ?></td><?php } ?>
                                                <?php if ($_GET['type'] == 'profit') { ?><td><?php echo $user['commission_amount']; ?></td><?php } ?>
                                                <td><?php echo $user['ipaddress']; ?></td>
                                                <td><?php
                                            echo $slot_key = date("d M Y h:i:s A", strtotime($user['gtime']));
                                                ?></td>


                                            </tr>
                                            <?php
                                        }if ($i == 0) {
                                            echo "<tr><td colspan='5'>No Records</td></tr>";
                                        }
                                        ?>




                                    </tbody>

                                </table>

                                <ul class="pagination">
                                    <?php
                                    $sqla = "SELECT COUNT(*) FROM gamebet WHERE status = 'completed'";
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
                                        echo '<li><a href="?page=' . ($currentPage - 1) . '&type=profit&export=this_month">Previous</a></li>';
                                    }

                                    // Display page links
                                    for ($i = $start; $i <= $end; $i++) {
                                        if ($i == $currentPage) {
                                            echo '<li class="active"><a>' . $i . '</a></li>';
                                        } else {
                                            echo '<li><a href="?page=' . $i . '&type=profit&export=this_month">' . $i . '</a></li>';
                                        }
                                    }

                                    // Display "Next" link if not on the last page
                                    if ($currentPage < $totalPages) {
                                        echo '<li><a href="?page=' . ($currentPage + 1) . '&type=profit&export=this_month">Next</a></li>';
                                    }
                                    ?>
                                </ul>





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

<!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>



</body>

</html>

