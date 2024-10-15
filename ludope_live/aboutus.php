<?php
include'includes/header.php';
$sql = mysqli_query($conn, "SELECT * FROM cms WHERE id='" . 1 . "'");
$cms = mysqli_fetch_assoc($sql);
?>
<?php include 'includes/header1.php'; ?>
<section id="terms about-us ">
    <div class="container">
        <div class="row">

            <div class="content">
                <div class="col-md-12">

                    <div class="about-content-sec common-cls terms">
                        <article>
                            <h2 align="center"><?= $cms['name'] ?></h2>
                            <?php
                            echo $cms['description'];
                            ?>
                    </div>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<?php include 'includes/footer.php'; ?>