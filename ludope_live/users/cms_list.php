<?php
require_once 'header.php';
$limit = 500;  // Number of entries to show in a page.
// Look for a GET variable page if not found default is 1.
if (isset($_GET["page"])) {
    $pn = $_GET["page"];
} else {
    $pn = 1;
};

$start_from = ($pn - 1) * $limit;


$sqlnew = mysqli_query($conn, "SELECT * FROM cms LIMIT $start_from, $limit");
//$user= mysqli_fetch_assoc($sqlnew);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            CMS Management
            <!--<small>advanced tables</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin/welcome/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">CMS</li>
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
                                    <th>Edit</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($user = mysqli_fetch_assoc($sqlnew)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $user['id']; ?></td>
                                        <td><?php echo $user['name']; ?></td>
                                        <td>
                                            <div class="btn-group text-right"><a class="btn btn-default" href="cmsedit.php?userid=<?php echo $user['id']; ?>">Edit</a> </div>
                                        </td>

                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>

                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>Referral</td>
                                    <td>
                                        <div class="btn-group text-right"><a class="btn btn-default" href="cmsreferral.php">Edit</a> </div>
                                    </td>

                                </tr>


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
                        $sqla = "SELECT COUNT(*) FROM cms";
                        $rs_result = mysqli_query($conn, $sqla);
                        $row = mysqli_fetch_row($rs_result);
                        $total_records = $row[0];

// Number of pages required.
                        $total_pages = ceil($total_records / $limit);
                        $pagLink = "";
                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($i == $pn) {
                                $pagLink .= "<li class='active'><a href='cms_list.php?page="
                                        . $i . "'>" . $i . "</a></li>";
                            } else {
                                $pagLink .= "<li><a href='cms_list.php?page=" . $i . "'>
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
