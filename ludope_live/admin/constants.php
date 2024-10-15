<?php
require_once 'header.php';
$sql = mysqli_query($conn, "SELECT * FROM constants WHERE id='1'");

$constants = mysqli_fetch_assoc($sql);

//echo "SELECT * FROM users WHERE id='1'"; die;

if (isset($_REQUEST['submit'])) {

    extract($_REQUEST);
    $notice_board = str_replace("'", "^", $notice_board);
    $sqlr = "UPDATE `constants` SET customer_care='$customer_care',whats_new_display='$whats_new_display',whats_new='$whats_new',notice_board_display='$notice_board_display',notice_board='$notice_board',current_version = '$current_version', minimium_withdraw = '$minimium_withdraw',maximum_withdraw = '$maximum_withdraw',lite_mode_commission_percentage = '$lite_mode_commission_percentage',global_commission_percentage='$global_commission_percentage',coins_gst_percentage ='$coins_gst_percentage',bet_percentage_deposit ='$bet_percentage_deposit',"
            . "bet_percentage_bonus = '$bet_percentage_bonus',referrer_amount = '$referrer_amount',referral_amount = '$referral_amount',minimum_deposit = '$minimum_deposit',maximum_deposit = '$maximum_deposit',signup_amount='$signup_amount',maintenance_content = '$maintenance_content',maintenance_display = '$maintenance_display'  where id='1'";

    mysqli_query($conn, $sqlr);
    echo '<script>alert("Constants Updated Successfully");</script>';
    echo '<script>window.location.href="constants.php"</script>';
}
?>


<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 837px;">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Constants for ludo
        </h1>

        <ol class="breadcrumb">

            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Constants for ludo</li>

        </ol>

    </section>



    <!-- Main content -->

    <section class="content">

        <div class="row">

            <!-- right column -->

            <div class="col-md-12">

                <!-- Horizontal Form -->

                <div class="box box-info">

                    <!--                    <div class="box-header with-border">

                                            <h3 class="box-title">Constants for ludo </h3>

                                             <div class="box-tools"><a href="list_user.php" class="btn btn-primary">User View</a></div>

                                        </div>-->

                    <!-- /.box-header -->

                    <!-- form start -->


                    <form action="" name="menu_form" method="post" enctype="multipart/form-data" accept-charset="utf-8">


                        <div class="form-horizontal">

                            <div class="box-body">

                                <div class="form-group">

                                    <label for="minimium_withdraw" class="col-sm-3 control-label">Android App Current Version</label>

                                    <div class="col-sm-6">

                                        <input type="number" class="form-control" id="current_version" placeholder="Current Version" name="current_version" value="<?= $constants['current_version'] ?>" required="required">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Android App version number" data-valmsg-replace="true"></span>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="minimium_withdraw" class="col-sm-3 control-label">Minimum Withdraw Amount</label>

                                    <div class="col-sm-6">

                                        <input type="number" class="form-control" id="minimium_withdraw" placeholder="Minimum Withdraw" min="10" name="minimium_withdraw" value="<?= $constants['minimium_withdraw'] ?>" required="required">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>
                                <div class="form-group">

                                    <label for="maximum_withdraw" class="col-sm-3 control-label">Maximum Withdraw Amount</label>

                                    <div class="col-sm-6">

                                        <input type="number" class="form-control" id="maximum_withdraw" placeholder="Maximum Withdraw" min="10" name="maximum_withdraw" value="<?= $constants['maximum_withdraw'] ?>" required="required">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>
                                <div class="form-group">

                                    <label for="commission_percentage" class="col-sm-3 control-label">Two Player Commission Percentage</label>

                                    <div class="col-sm-6">

                                        <input type="number" class="form-control" id="commission_percentage" placeholder="Global Commission Percentage" min="1" max="100" name="global_commission_percentage" value="<?= $constants['global_commission_percentage'] ?>" required="required">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>
                                <div class="form-group">

                                    <label for="commission_percentage" class="col-sm-3 control-label">Four Player Commission Percentage</label>

                                    <div class="col-sm-6">

                                        <input type="number" class="form-control" id="lite_mode_commission_percentage" placeholder="Lite Mode Commission Percentage" min="1" max="100" name="lite_mode_commission_percentage" value="<?= $constants['lite_mode_commission_percentage'] ?>" required="required">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="minimium_withdraw" class="col-sm-3 control-label">Coins GST Percentage</label>

                                    <div class="col-sm-6">

                                        <input type="number" class="form-control" id="minimium_withdraw" placeholder="Minimum Withdraw" name="coins_gst_percentage" value="<?= $constants['coins_gst_percentage'] ?>" required="required">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>


                                <div class="form-group">

                                    <label for="minimium_withdraw" class="col-sm-3 control-label">Bet Percentage from deposit</label>

                                    <div class="col-sm-6">

                                        <input type="number" class="form-control" id="minimium_withdraw" placeholder="Bet Percentage from deposit" name="bet_percentage_deposit" value="<?= $constants['bet_percentage_deposit'] ?>" required="required">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>



                                <div class="form-group">

                                    <label for="minimium_withdraw" class="col-sm-3 control-label">Bet Percentage from bonus</label>

                                    <div class="col-sm-6">

                                        <input type="number" class="form-control" id="minimium_withdraw" placeholder="Bet Percentage from bonus" name="bet_percentage_bonus" value="<?= $constants['bet_percentage_bonus'] ?>" required="required">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="referrer_amount" class="col-sm-3 control-label">Signup Bonus</label>

                                    <div class="col-sm-6">

                                        <input type="number" class="form-control" id="signup_amount" placeholder="Signup Bonus" min="0" max="1000" name="signup_amount" value="<?= $constants['signup_amount'] ?>" required="required">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>
                                <div class="form-group">

                                    <label for="referrer_amount" class="col-sm-3 control-label">Referrer Amount (Who referred)</label>

                                    <div class="col-sm-6">

                                        <input type="number" class="form-control" id="referrer_amount" placeholder="Referrer Amount" min="0" max="100" name="referrer_amount" value="<?= $constants['referrer_amount'] ?>" required="required">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>
                                <div class="form-group">

                                    <label for="referral_amount" class="col-sm-3 control-label">Referral Amount (New user)</label>

                                    <div class="col-sm-6">

                                        <input type="number" class="form-control" id="referral_amount" placeholder="Referral Amount" min="0" name="referral_amount" value="<?= $constants['referral_amount'] ?>" required="required">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>
                                <div class="form-group">

                                    <label for="minimum_deposit" class="col-sm-3 control-label">Minimum Deposit Amount</label>

                                    <div class="col-sm-6">

                                        <input type="number" class="form-control" id="minimum_deposit" placeholder="Minimum Deposit Amount" min="1" max="100" name="minimum_deposit" value="<?= $constants['minimum_deposit'] ?>" required="required">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>
                                <div class="form-group">

                                    <label for="maximum_deposit" class="col-sm-3 control-label">Maximum Deposit Amount</label>

                                    <div class="col-sm-6">

                                        <input type="number" class="form-control" id="maximum_deposit" placeholder="Maximum Deposit Amount" min="1" name="maximum_deposit" value="<?= $constants['maximum_deposit'] ?>" required="required">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>
                                <div class="form-group">

                                    <label for="maximum_deposit" class="col-sm-3 control-label">Notice Board Display</label>

                                    <div class="col-sm-6">

                                        <select  class="form-control" id="notice_board_display"  name="notice_board_display">
                                            <option <?php
                                            if ($constants['notice_board_display'] == 'Yes') {
                                                echo "selected";
                                            }
                                            ?>>Yes</option>
                                            <option <?php
                                            if ($constants['notice_board_display'] == 'No') {
                                                echo "selected";
                                            }
                                            ?>>No</option>
                                        </select>



                                    </div>

                                </div>
                                <div class="form-group">

                                    <label for="maximum_deposit" class="col-sm-3 control-label">Customer Care Number</label>

                                    <div class="col-sm-6">


                                        <textarea  class="form-control" id="customer_care"  name="customer_care"><?= $constants['customer_care'] ?></textarea>
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>
                                <div class="form-group">

                                    <label for="maximum_deposit" class="col-sm-3 control-label">Notice Board</label>

                                    <div class="col-sm-6">

                                        <textarea  class="form-control" id="notice_board"  name="notice_board"><?= $constants['notice_board'] ?></textarea>

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>


                                <div class="form-group">

                                    <label for="maximum_deposit" class="col-sm-3 control-label">Maintenance display</label>

                                    <div class="col-sm-6">

                                        <select  class="form-control" id="maintenance_display"  name="maintenance_display">
                                            <option <?php
                                            if ($constants['maintenance_display'] == 'Yes') {
                                                echo "selected";
                                            }
                                            ?>>Yes</option>
                                            <option <?php
                                            if ($constants['maintenance_display'] == 'No') {
                                                echo "selected";
                                            }
                                            ?>>No</option>
                                        </select>



                                    </div>

                                </div>


                                <div class="form-group">

                                    <label for="maximum_deposit" class="col-sm-3 control-label">Maintenance content</label>

                                    <div class="col-sm-6">

                                        <textarea  class="form-control" id="maintenance_content"  name="maintenance_content"> <?= $constants['maintenance_content'] ?></textarea>

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>







                                <div class="form-group">

                                    <label for="maximum_deposit" class="col-sm-3 control-label">What's New Display</label>

                                    <div class="col-sm-6">

                                        <select  class="form-control" id="whats_new_display"  name="whats_new_display">
                                            <option <?php
                                            if ($constants['whats_new_display'] == 'Yes') {
                                                echo "selected";
                                            }
                                            ?>>Yes</option>
                                            <option <?php
                                            if ($constants['whats_new_display'] == 'No') {
                                                echo "selected";
                                            }
                                            ?>>No</option>
                                        </select>



                                    </div>

                                </div>
                                <div class="form-group">

                                    <label for="maximum_deposit" class="col-sm-3 control-label">What's New Content</label>

                                    <div class="col-sm-6">

                                        <textarea  class="form-control" id="whats_new"  name="whats_new"> <?= $constants['whats_new'] ?></textarea>

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>


                            </div>

                            <!-- /.box-body -->

                        </div>

                        <div class="box-footer" align="center">
                            <input type="hidden" class="form-control" id="insert"  value="1">

                            <button type="submit" id="submittrns" name="submit" class="btn btn-lg btn-info">Submit</button>


                        </div>

                        <!-- /.box-footer -->

                    </form>
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
<!--script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script type="text/javascript">

    CKEDITOR.replace('notice_board', {

        width: "800px",
        height: "500px"

    });

</script-->
</body>




</html>

