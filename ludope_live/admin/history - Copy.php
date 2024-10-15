<?php require_once 'header.php'; ?>
<?php
$limit = 20;  // Number of entries to show in a page.
// Look for a GET variable page if not found default is 1.
$where = $date1 = $date2 = $user_search = '';
if ($_GET['date1'] != '' && $_GET['date2'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];
    $where = "WHERE CAST(gtime AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date1'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date1'];
    $where = "WHERE CAST(gtime AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date2'] != '') {
    $date1 = $_GET['date2'];
    $date2 = $_GET['date2'];
    $where = "WHERE CAST(gtime AS DATE) BETWEEN '$date1' AND '$date2'";
}
if ($_GET['user_search'] != '') {
    $user_search = $_GET['user_search'];
    $s = "SELECT GROUP_CONCAT(id,',') from users where name like '%$user_search%' or mobile like '%$user_search%' or email like '%$user_search%'";
    if ($where != '') {
        $where .= " and find_in_set(gamebet.userid, ($s))";
    } else {
        $where .= "WHERE find_in_set(gamebet.userid, ($s))";
    }
}

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


                        <!--                        <div class="box box-info">








                                                </div>-->

                        <div class="box-body">
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
                                    <div class="col-md-3">
                                        <input type="text" name="date1" class="form-control" id="dt1" placeholder="yyyy-mm-dd" value="<?php
                                        if (isset($_GET['date1'])) {
                                            echo $_GET['date1'];
                                        }
                                        ?>"/>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="date2" class="form-control" id="dt2" placeholder="yyyy-mm-dd" value="<?php
                                        if (isset($_GET['date2'])) {
                                            echo $_GET['date2'];
                                        }
                                        ?>"/>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                    </div>
                                </form>
                                <?php
                                $touserinfo1 = mysqli_query($conn, "select sum(gamebet.amount) as amount,sum(gamebet.wng_amount) as wng_amount,sum(gamebet.commission_amount) as commission_amount from gamebet $where");
                                $k = mysqli_fetch_assoc($touserinfo1);
                                ?>
                                <div class="col-md-4">
                                    <h4><?php echo "Bet Amount: " . $k['amount']; ?></h4>
                                </div>
                                <div class="col-md-4">
                                    <h4><?php echo "Winning Amount: " . $k['wng_amount']; ?></h4>
                                </div>
                                <div class="col-md-4">
                                    <h4><?php echo "Commision Amount: " . $k['commission_amount']; ?></h4>
                                </div>
                            </div>
                            <div class="table-responsive" style="padding-top: 20px">
                                <table id="example1" class="table table-bordered table-striped  table-hover">
                                    <thead>
                                        <tr>
<!--                                            <th>Trans No.</th>-->
                                            <th>#</th>
                                            <th>Participants</th>
                                            <th>Amount</th>
                                            <th>Date and time</th>
                                            <th>Table</th>
                                            <th>Game Id</th>
                                            <th>Result</th>
                                            <th>Commission</th>
                                            <th>Winning amount</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($uid == '1') {
                                            //echo "select gamebet.* from gamebet $where group by gamebet.gameid ORDER BY gamebet.id DESC LIMIT $start_from, $limit";
                                            $touserinfo = mysqli_query($conn, "select gamebet.* from gamebet $where AND gamebet.userid!=0 group by gamebet.gameid ORDER BY gamebet.id DESC LIMIT $start_from, $limit");
                                        }
                                        ?>
                                        <?php
                                        while ($user = mysqli_fetch_assoc($touserinfo)) {
                                            $userid = $user['userid'];
                                            $uinfo = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
                                            $userinfo = mysqli_fetch_assoc($uinfo);
                                            ?>

                                            <tr>
    <!--                                                <td><?php echo $user['id']; ?></td>-->
                                                <td><?php echo ++$i; ?></td>
                                                <td><?php echo $userinfo['name']; ?> - <?php echo $userinfo['mobile']; ?></td>
                                                <td><?php echo $user['amount']; ?></td>
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
                                                <td><?php echo $user['gameid']; ?></td>
                                                <td><?php
                                                    echo ($user['losewin'] != '') ? $user['losewin'] : 'looser'
                                                    ;
                                                    ?></td>
                                                <td><?php echo $user['commission_amount']; ?></td>
                                                <td><?php echo $user['wng_amount']; ?></td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>







                            </div>
                            <ul class="pagination">
                                <?php
                                $sqla = "select gamebet.id from gamebet $where group by gamebet.gameid ORDER BY gamebet.id DESC";
                                $rs_result = mysqli_query($conn, $sqla);
                                $row = mysqli_fetch_row($rs_result);
//                                $total_records = $row[0];
                                $total_records = mysqli_num_rows($rs_result);


// Number of pages required.
                                $total_pages = ceil($total_records / $limit);
                                $pagLink = "";
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $pn) {
                                        $pagLink .= "<li class='active'><a href='history.php?page="
                                                . $i . "&user_search=$user_search&date1=$date1&date2=$date2'>" . $i . "</a></li>";
                                    } else {
                                        $pagLink .= "<li><a href='history.php?page=" . $i . "&user_search=$user_search&date1=$date1&date2=$date2'>
                                                " . $i . "</a></li>";
                                    }
                                };
                                echo $pagLink;
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
