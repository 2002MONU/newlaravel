<?php
require_once '../admin/config.php';
$sql = mysqli_query($conn, "SELECT * FROM cms WHERE id=5");
$cms = mysqli_fetch_assoc($sql);
?>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="mobile-header.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class="top-bar">
    <div class="container-fluid">

        <div class="col-md-4 d-md-block d-none">
            <a href="uniwebview://close"><img src="mobile-back-btn.png" width="32" height="32" class="sidelogo" style="margin-left:-10px"></a>
            <h4 class="toplogotitle">FAQ'S</h4>
        </div>
    </div>
</div>

<section id="terms about-us ">
    <div class="container-fluid">
        <div class="row">

            <div class="content">
                <div class="col-md-12">

                    <div class="about-content-sec terms">

                        <article>
<!--                            <h2 align="center"><?= $cms['name'] ?></h2>-->
                            <?php
                            echo $cms['description'];
                            ?>

                        </article>
                    </div>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
