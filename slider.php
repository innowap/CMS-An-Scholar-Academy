<?php
$query = "SELECT * FROM sliders";
$select_all_slides = mysqli_query($connection, $query);

?>
<section class="home-slider owl-carousel">
    <?php

    while ($row = mysqli_fetch_assoc($select_all_slides)) {

        $slider_caption = $row['slider_caption'];
        $slider_image = $row['slider_image'];
        ?>

    <div class="slider-item" style="background-image:url(images/slider/<?php echo $slider_image; ?>);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center"
                data-scrollax-parent="true">
                <div class="col-md-8 text-center ftco-animate">
                    <h1 class="mb-4"><?php echo $slider_caption; ?></span></h1>
                </div>
            </div>
        </div>
    </div>

    <?php
    }
    ?>
</section>