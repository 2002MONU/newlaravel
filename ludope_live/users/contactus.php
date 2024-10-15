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

$sqlnew = mysqli_query($conn, "SELECT * FROM contact_enquiries order by id desc LIMIT $start_from, $limit");
//$user= mysqli_fetch_assoc($sqlnew);

if (isset($_GET['delid'])) {
    mysqli_query($conn, "DELETE FROM contact_enquiries where id = '" . $_GET['delid'] . "'");
    echo '<script>window.location.href="contactus.php"</script>';
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Customer Feedback
             <!--<small>advanced tables</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin/welcome/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Customer Feedback</li>
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




                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Message</th>
                                    <th>Created at</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = $start_from;
                                while ($user = mysqli_fetch_assoc($sqlnew)) {
                                    ?>
                                    <tr>
                                        <td><?php echo ++$i; //echo $user['id'];            ?></td>
                                        <td><?php echo $user['name']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['mobile']; ?></td>
                                        <td style="width: 150px"><?php echo $user['message']; ?></td>
                                        <td><?php echo date('d-m-Y h:i:s', $user['created_at']); ?></td>
                                        <td><a class="btn btn-danger" href="contactus.php?delid=<?= $user['id']; ?>" onclick="return confirm('Are you sure? Want to delete.')">Delete</a></td>
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
                        $sqla = "SELECT COUNT(*) FROM contact_enquiries";
                        $rs_result = mysqli_query($conn, $sqla);
                        $row = mysqli_fetch_row($rs_result);
                        $total_records = $row[0];

// Number of pages required.
                        $total_pages = ceil($total_records / $limit);
                        $pagLink = "";
                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($i == $pn) {
                                $pagLink .= "<li class='active'><a href='contactus.php?page="
                                        . $i . "'>" . $i . "</a></li>";
                            } else {
                                $pagLink .= "<li><a href='contactus.php?page=" . $i . "'>
                                                " . $i . "</a></li>";
                            }
                        };
                        echo $pagLink;
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
<?php require_once "footer.php"; ?>

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

</body>
</html>
