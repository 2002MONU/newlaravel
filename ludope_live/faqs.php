<?php
include'includes/header.php';
$sql = mysqli_query($conn, "SELECT * FROM cms WHERE id='" . 5 . "'");
$cms = mysqli_fetch_assoc($sql);
?>
<style>
    #help1 {
        background: #5f57ea;
        /*        padding: 80px 0px;*/
    }
    .inner-banner {
        background: #000 url(../img/inner-banner-bg.jpg) center center no-repeat;
    }
    .btn-back{
        background-color:#0061c0;
        color:#fff;
        font-size:14px;
        float:right;
        padding:5px 15px;
        border-radius:5px;
    }
</style>


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