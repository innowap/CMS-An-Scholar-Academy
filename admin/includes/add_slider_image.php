<?php

if (isset($_SESSION['username'])) {
    $s_username = $_SESSION['username'];
}


if (isset($_POST['create_slider'])) {



    $slider_caption = $_POST['slider_caption'];

    $slider_image = $_FILES['image']['name'];
    $slider_image_temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($slider_image_temp, "../images/slider/$slider_image");


    $slider_date = date('D, F d, Y - h:i:s A');


    move_uploaded_file($slider_image_temp, "../images/slider/$slider_image");

    $query = "INSERT INTO sliders(slider_caption, slider_date, slider_image) ";
    $query .= "VALUES('{$slider_caption}','{$slider_date}','{$slider_image}') ";

    $create_slider_query = mysqli_query($connection, $query);
    confirm($create_slider_query);
    $p_id = mysqli_insert_id($connection);

    echo "<div class='alert alert-success'><strong>Success!</strong> Slider successfully added. <a href='image-slider.php?p_id={$p_id}'>View Slider</a></div>";
}
?>


<h1 class="page-header">
    Add Slider Image
    <small></small>
</h1>
<script>
tinymce.init({
    selector: 'textarea'
});
</script>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Slider Caption</label>
        <input type="text" class="form-control" name="slider_caption"> </div>

    <div class="form-group">
        <label for="slider_image">Slider Image</label>
        <input type="file" name="image" class="form-group" required> </div>

    </div>
    <div class="btn-group btn-group-lg">
        <input type="submit" name="create_slider" class="btn btn-primary" value="Create Slider">
    </div>
</form>