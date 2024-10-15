<?php
require_once 'header.php';
$useridnew = $_GET['userid'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 837px;">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1> Referal History </h1>

        <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="user_list.php">User</a></li>

            <li class="active"> Referal History</li>

        </ol>

    </section>



    <!-- Main content -->

    <section class="content">

        <div class="row">

            <!-- right column -->

            <div class="col-md-12">

                <!-- Horizontal Form -->

                <div class="box box-info">

                    <div class="box-header with-border">

                        <h3 class="box-title">User Referal History </h3>

                    </div>


                </div>

                <!-- /.box -->

                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped  table-hover">
                        <thead>
                            <tr>


                                <th>User Name</th>
                                <th> Date and time</th>
                                <th> Earn Bonus</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $touserinfo = mysqli_query($conn, "select * from gamebet where userid='" . $useridnew . "' ORDER BY id DESC");
                            ?>
                            <?php while ($user = mysqli_fetch_assoc($touserinfo)) {
                                ?>

                                <tr>


                                    <td><?php echo $user['amount']; ?></td>
                                    <td><?php
                                        $date = $user['gtime'];
                                        $timestamp = strtotime($date);
                                        echo $slot_key = date("d M Y h:i:s A", $timestamp);
                                        ?>
                                    </td>
                                    <td><?php
                                        $table = $user['tabletype'];
                                        if ($table == '11') {
                                            echo '2 Player';
                                        } if ($table == '21') {
                                            echo 'Private Table';
                                        } if ($table == 'FourPlayer') {
                                            echo '4 Player';
                                        }
                                        ?></td>

                                    <td><?php
                                        $losewin = $user['losewin'];
                                        if ($losewin == 'winner') {
                                            echo 'Winner';
                                        } else {
                                            echo 'Loser';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>







                </div>

                <!--/.col (right) -->

            </div>

            <!-- /.row -->

    </section>

    <!-- /.content -->

</div>
<?php
require_once 'footer.php';
?>
</body>
</html>

