    <!-- <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section heading-section-black ftco-animate">
                    <h2 class="mb-4"><span>Our School</h2>
                    <p>At a glance</p>
                </div>
            </div>
            <div class="row d-md-flex align-items-center justify-content-center">
                <div class="col-lg-10">
                    <div class="row d-md-flex align-items-center">
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="23">0</strong>
                                    <span>Certified Teachers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="751">0</strong>
                                    <span>Successful Kids</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="6">0</strong>
                                    <span>Years Old</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section> -->

    <!-- Testimony  -->
    <?php
    $query = "SELECT * FROM testimony WHERE status = 'Approved'";
    $select_all_testimony = mysqli_query($connection, $query);

    ?>

    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4"><span>What Parents</span> Says About Us</h2>
                    <p>Testimonies from parents</p>
                </div>
            </div>

            <div class="row ftco-animate justify-content-center">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <?php
                        while ($row = mysqli_fetch_assoc($select_all_testimony)) {
                            $name = $row['name'];
                            $testimony = $row['testimony'];

                            ?>


                        <div class="item">
                            <div class="testimony-wrap d-flex">
                                <div class="text ml-2 bg-light">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                    <p><?php echo $testimony ?></p>
                                    <p class="name"><strong><?php echo $name ?> </strong> </p>

                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>



                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-gallery">
        <div class="container-wrap">
            <div class="row no-gutters">
                <?php
                $query = "SELECT * FROM gallery";
                $select_all_gallery = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_gallery)) {
                    $gallery_image = $row['gallery_image'];

                    ?>

                <div class="col-md-3 ftco-animate">
                    <a href="images/gallery/<?php echo $gallery_image ?>"
                        class="gallery image-popup img d-flex align-items-center"
                        style="background-image: url(images/gallery/<?php echo $gallery_image ?>);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <?php
                }
                ?>

            </div>
    </section>

    <!-- Footer  -->
    <?php
    include('includes/footer.php');

    ?>




    <!-- loader -->