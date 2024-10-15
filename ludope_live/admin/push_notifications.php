<?php
require_once 'header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Push Notifications
            <!--<small>advanced tables</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin/welcome/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Push Notifications</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Push Notifications List &nbsp;</h3>
                        <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#notificationSendModal">Send Notifications</button>
                    </div>
                    <!-- /.box-header -->
                    <?php if (!empty($_GET['success'])) { ?>

                        <div class="alert alert-success" role="alert">
                            Notifications successfully sent!
                        </div>
                    <?php } ?>
                    <div class="box-body table-responsive">
                        <table id="" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Sent</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $notifications = mysqli_query($conn, "SELECT * FROM push_notifications ORDER BY id DESC");
                                ?>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($notifications)) {
                                    if ($row['user_id']>0) {
                                        $result = mysqli_query($conn, "SELECT name FROM users WHERE id = " . $row['user_id']);
                                        $user = mysqli_fetch_row($result);
                                        
                                    }
                                    ?>
                                    <tr>
                                        <th><?= $i++ ?></th>
                                        <td><?= ($row['user_id'] == 0 || empty($row['user_id'])) ? "All Users" : $user[0] ?></td>
                                        <td><?= $row['title'] ?></td>
                                        <td><?= $row['description'] ?></td>
                                        <td><?= $row['created_at'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>


                    <ul class="pagination">

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

    <div class="modal fade" id="notificationSendModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form" action="<?= $base_url . "send_notifications.php" ?>" method="post">

                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Select User</label>
                            <select class="form-control chzn-select col-12" name="user_id" id="selUser" style="width: 100%">
                                <option value="0">All Users</option>
                                <?php
                                $users_list = mysqli_query($conn, "SELECT * FROM users WHERE status = 1 AND token IS NOT NULL ORDER BY name ASC");
                                while ($user = mysqli_fetch_assoc($users_list)) {
                                    ?>
                                    <option value="<?= $user['id'] ?>"><?= $user['name'] ?> (ph: <?= $user['mobile'] ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Notification Title"/>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" name="description" placeholder="Enter Notification Description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require_once "footer.php"; ?>

</body>
</html>
