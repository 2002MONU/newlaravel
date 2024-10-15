<?php require_once 'header.php'; ?>
<?php
$limit = 20;  // Number of entries to show in a page.
// Look for a GET variable page if not found default is 1.
if ($_GET['date1'] != '' && $_GET['date2'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];
    $where = "WHERE CAST(gb.gtime AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date1'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date1'];
    $where = "WHERE CAST(gb.gtime AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date2'] != '') {
    $date1 = $_GET['date2'];
    $date2 = $_GET['date2'];
    $where = "WHERE CAST(gb.gtime AS DATE) BETWEEN '$date1' AND '$date2'";
}
if ($_GET['gameid'] != '') {
    $gameid = $_GET['gameid'];
    $where = " where gameid='$gameid' ";
}
if ($_GET['user_search'] != '') {
    $user_search = $_GET['user_search'];
    $s = "SELECT GROUP_CONCAT(id,',') from users where name like '%$user_search%' or mobile like '%$user_search%' or email like '%$user_search%'";
    if ($where != '') {
        $where .= " and find_in_set(gb.userid, ($s))";
    } else {
        $where .= "WHERE find_in_set(gb.userid, ($s))";
    }
}
$status = 'completed';
if ($_GET['status'] != '') {
    $status = $_GET['status'];
}
if ($where != '') {
    $where .= " AND gb.status = '" . $status . "'";
} else {
    $where .= "WHERE gb.status = '" . $status . "'";
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
                            <div class="row">
                                <form method="get">
                                    <input type="hidden" name="page" value="<?php
//                                    if (isset($_GET['page'])) {
//                                        echo $_GET['page'];
//                                    } else {
                                    echo '1';
//                                    }
                                    ?>" />
                                    <div class="col-md-2">
                                        <input type="text" name="gameid" class="form-control" placeholder="Game Id" value="<?php
                                        if (isset($_GET['gameid'])) {
                                            echo $_GET['gameid'];
                                        }
                                        ?>"  />
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="user_search" class="form-control" placeholder="Name/Mobile/Email" value="<?php
                                        if (isset($_GET['user_search'])) {
                                            echo $_GET['user_search'];
                                        }
                                        ?>"  />
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="date1" class="form-control" id="dt1" placeholder="yyyy-mm-dd" value="<?php
                                        if (isset($_GET['date1'])) {
                                            echo $_GET['date1'];
                                        }
                                        ?>"/>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="date2" class="form-control" id="dt2" placeholder="yyyy-mm-dd" value="<?php
                                        if (isset($_GET['date2'])) {
                                            echo $_GET['date2'];
                                        }
                                        ?>"/>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="status">
                                            <option value="completed" <?php
                                            if (isset($_GET['status']) && $_GET['status'] == 'completed') {
                                                echo 'selected';
                                            } else {
                                                echo 'selected';
                                            }
                                            ?> >Completed</option>
                                            <option value="running" <?php
                                            if (isset($_GET['status']) && $_GET['status'] == 'running') {
                                                echo 'selected';
                                            }
                                            ?>>Running</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                        <a target="_blank" href="export_history.php?user_search=<?= $user_search; ?>&date1=<?= $date1; ?>&date2=<?= $date2; ?>&status=<?= $status; ?>" ><div class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</div></a>
                                    </div>
                                </form>
                                <?php
                                $touserinfo1 = mysqli_query($conn, "select sum(gb.amount) as amount,sum(gb.wng_amount) as wng_amount,sum(gb.commission_amount) as commission_amount from gamebet as gb $where");

                                $k = mysqli_fetch_assoc($touserinfo1);
                                ?>
                                <div class="col-md-4">
                                    <h4><?php echo "Bet Amount: " . round($k['amount'], 2); ?></h4>
                                </div>
                                <?php if ($status == 'completed') { ?>
                                    <div class="col-md-4">
                                        <!--<h4><?php //echo "Winning Amount: " . round($k['wng_amount'], 2);                                                                                    ?></h4>-->
                                        <h4><?php echo "Winning Amount: " . round($k['wng_amount'], 2); ?></h4>
                                    </div>
                                    <div class="col-md-4">
                                        <!--<h4><?php //echo "Commision Amount: " . round($k['commission_amount'], 2);                                                                                     ?></h4>-->
                                        <h4><?php echo "Commision Amount: " . round($k['commission_amount'], 2); ?></h4>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="table-responsive" style="padding-top: 20px">
                                <table id="example1" class="table table-bordered table-striped  table-hover">
                                    <thead>
                                        <tr>
<!--                                            <th>Trans No.</th>-->
                                            <th>#</th>
                                            <th>Participants</th>
                                            <th>Amount</th>
                                            <th>Game Start time</th>
                                            <th>Game Completed</th>
                                            <th>Table</th>
                                            <th>Game Id</th>
                                            <?php if ($status == 'completed') { ?>
                                                <th>Result</th>
                                                <th>Commission</th>
                                                <th>Winning amount</th>

                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT gb.*, u.name, u.mobile FROM gamebet gb
              LEFT JOIN users u ON gb.userid = u.id
              $where AND gb.userid != 0
              GROUP BY gb.gameid
              ORDER BY gb.id DESC
              LIMIT $start_from, $limit";
                                        $touserinfo = mysqli_query($conn, $query);

                                        $k = 1;
                                        while ($user = mysqli_fetch_assoc($touserinfo)) {
                                            $gid = $user['gameid'];
                                            ?>
                                            <tr>
                                                <td><?php echo $k++; ?></td>
                                                <td>
                                                    <?php
                                                    $real_players = [];
                                                    $bot_count = 0;
                                                    $players_query = mysqli_query($conn, "SELECT u.name,u.mobile,gb.amount FROM gamebet gb INNER JOIN users u ON gb.userid = u.id WHERE gb.gameid='$gid' AND gb.userid != 0");
                                                    while ($row = mysqli_fetch_assoc($players_query)) {
                                                        if ($row['userid'] == '0') {
                                                            $bot_count++;
                                                        } else {
                                                            $real_players[] = $row;
                                                        }
                                                    }
                                                    foreach ($real_players as $player) {
                                                        if ($player['userid'] == '0') {
                                                            echo 'Computer<br>';
                                                        } else {
                                                            echo $player['name'] . '-' . $player['mobile'] . '<br>';
                                                        }
                                                    }
                                                    for ($i = 0; $i < $bot_count; $i++) {
                                                        echo 'Computer<br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    foreach ($real_players as $player) {
                                                        echo ($player['userid'] == '0') ? '0<br>' : $player['amount'] . '<br>';
                                                    }
                                                    for ($i = 0; $i < $bot_count; $i++) {
                                                        echo '0<br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo date("d M Y h:i:s A", strtotime($user['gtime'])); ?></td>
                                                <td><?php echo ($user['status'] == 'completed') ? date("d M Y h:i:s A", strtotime($user['gamecomplete'])) : "----"; ?></td>
                                                <td><?php echo $user['game_type'] . (($user['tabletype'] == '12' || $user['tabletype'] == '22') ? ' - 2 Player' : ' - 4 Player'); ?></td>
                                                <td><?php echo $user['gameid']; ?></td>
                                                <?php if ($status == 'completed') { ?>
                                                    <td>
                                                        <?php
                                                        $winners_query = mysqli_query($conn, "SELECT u.name FROM gamebet gb INNER JOIN users u ON gb.userid = u.id WHERE gb.gameid='$gid' AND gb.userid != 0 AND gb.losewin='winner' ORDER BY gb.wng_amount DESC");
                                                        $winners_count = mysqli_num_rows($winners_query);
                                                        if ($winners_count > 0) {
                                                            while ($winner = mysqli_fetch_assoc($winners_query)) {
                                                                echo $winner['name'] . "<br>";
                                                            }
                                                        } else {
                                                            echo 'Computer';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $commission_query = mysqli_query($conn, "SELECT SUM(commission_amount) as total_commission FROM gamebet WHERE gameid='$gid' AND userid != 0 AND losewin='winner' AND commission_amount > 0");
                                                        $commission_row = mysqli_fetch_assoc($commission_query);
                                                        echo ($commission_row['total_commission']) ? $commission_row['total_commission'] : "0";
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $winnings_query = mysqli_query($conn, "SELECT wng_amount FROM gamebet WHERE gameid='$gid' AND userid != 0 AND losewin='winner' ORDER BY wng_amount DESC");
                                                        while ($winnings_row = mysqli_fetch_assoc($winnings_query)) {
                                                            echo $winnings_row['wng_amount'] . "<br>";
                                                        }
                                                        ?>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>







                            </div>
                            <ul class="pagination">
                                <?php
                                $rs_result = mysqli_query($conn, "SELECT gb.* FROM gamebet gb

              $where AND gb.userid != 0
              GROUP BY gb.gameid
              ORDER BY gb.id DESC
              ");

                                $row = mysqli_fetch_row($rs_result);
                                $total_records = mysqli_num_rows($rs_result);

                                $total_pages = ceil($total_records / $limit);
//                                $pagLink = "";
//                                for ($i = 1; $i <= $total_pages; $i++) {
//                                    if ($i == $pn) {
//                                        $pagLink .= "<li class='active'><a href='history.php?page="
//                                                . $i . "&user_search=$user_search&date1=$date1&date2=$date2&status=$status'>" . $i . "</a></li>";
//                                    } else {
//                                        $pagLink .= "<li><a href='history.php?page=" . $i . "&user_search=$user_search&date1=$date1&date2=$date2&status=$status'>
//                                                " . $i . "</a></li>";
//                                    }
//                                };
//                                echo $pagLink;


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
