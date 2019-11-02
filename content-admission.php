<?php
$query = "SELECT * FROM admission";
$select_all = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($select_all);
$form = $row['form'];
$caption = $row['caption'];
$contents = $row['contents'];

?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/admission.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread"><?php echo $caption; ?></h1>

                <p class="breadcrumbs"><a href="forms/<?php echo $form; ?>" class="btn btn-secondary">Download
                        Form</a></p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pt ftc-no-pb">
    <div class="container">
        <div class="col-md-12 order-md-last wrap-about py-5 wrap-about bg-light">
            <div class="text px-4 ftco-animate">


                <p>
                    <?php echo $contents; ?>

                </p>
                <a href="forms/<?php echo $form; ?>" class="btn btn-secondary">Download Form</a>
            </div>

        </div>

    </div>

</section>