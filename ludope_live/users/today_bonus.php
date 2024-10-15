<?php
require_once 'header.php';
$month_start = date('Y-m-01 00:00:01');
$month_end = date('Y-m-t 23:59:59');
$today_start = date('Y-m-d 00:00:01');
$today_end = date('Y-m-d 23:59:59');
?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 837px;">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Today Bonus Given <a href="bonus_export.php?export=today" ><div class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</div></a>


        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            
            <li class="active">Today Bonus Given</li>

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
                                    <th>Bonus Type</th>
                                   <th>Amount</th>
                                    <th>Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                            if($_GET['export']=='today'){
                                                $sqlnew = mysqli_query($conn, "SELECT * FROM bonus WHERE (date BETWEEN '$today_start' AND '$today_end')");
                                            }else{
$sqlnew = mysqli_query($conn, "SELECT * FROM bonus WHERE (date BETWEEN '$month_start' AND '$month_end')");
                                            }while ($user = mysqli_fetch_assoc($sqlnew)) {
                                   $det = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user['user_id'] . "'"));
                                     ?>
                                    <tr>
                                        <td><?= ++$i; ?></td>
                                        <td><?php echo $det['name']; ?></td>
                                        <td><?php echo $det['mobile']; ?></td>
                                       <td><?php echo $user['bonus_type'];?></td>
                                       <td><?php echo $user['bonus'];?></td>
                                        <td><?php
                                            echo $slot_key = date("d M Y h:i:s A", strtotime($user['date']));
                                            ?></td>
                                        

                                    </tr>
                                <?php }if($i==0){echo "<tr><td colspan='5'>No Records</td></tr>";} ?>




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

<!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>



</body>

</html>

