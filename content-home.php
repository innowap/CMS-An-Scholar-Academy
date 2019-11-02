<?php
$query = "SELECT * FROM main_contents";
$select_all_main = mysqli_query($connection, $query);

?>
<section class="ftco-services ftco-no-pb">
    <div class="container-wrap">
        <div class="row no-gutters">
            <?php
            $query = "SELECT * FROM side_contents";
            $select_all_side = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_all_side)) {
                $side_title = $row['content_title'];
                $side_contents = $row['contents'];
                $bgcolor = $row['bgcolor'];
                ?>

            <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-<?php echo $bgcolor ?>">
                <div class="media block-6 d-block text-center">
                    <div class="media-body p-2 mt-3">
                        <h3 class="heading"><?php echo $side_title ?></h3>
                        <p><?php echo $side_contents ?></p>
                        <div class=" d-flex justify-content-center align-items-center">
                            <a href="#" class="btn btn-secondary">Read More...</a>
                        </div>

                    </div>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>


<!-- Proprietor messages -->

<section class="ftco-section ftco-no-pt ftc-no-pb" id="about">
    <div class="container">
        <?php

        while ($row = mysqli_fetch_assoc($select_all_main)) {

            $main_contents = $row['main_contents'];
            $side_contents = $row['side_contents'];
            ?>

        <div class="row">
            <div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
                <div class="text px-4 ftco-animate">

                    <p><?php
                                echo $side_contents;
                                ?></p>
                    <p><a href="#" class="btn btn-secondary px-4 py-3">Read More</a></p>
                </div>
            </div>


            <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">

                <p class="text-justify">
                    <?php
                            echo $main_contents;
                            ?>
                </p>



            </div>


        </div>
        <?php
        }
        ?>

    </div>
</section>



<section class="ftco-intro" style="background-image: url(images/admission.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>Download Admission form </h2>

            </div>
            <div class="col-md-3 d-flex align-items-center">
                <p class="mb-0"><a href="admission.php" class="btn btn-secondary px-4 py-3">Download Now </a></p>
            </div>
        </div>
    </div>
</section>