<?php

if (isset($_SESSION['username'])) {
    $s_username = $_SESSION['username'];
}


if (isset($_POST['create_gallery'])) {





    $gallery_image = $_FILES['image']['name'];
    $gallery_image_temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($gallery_image_temp, "../images/gallery/$gallery_image");


    $gallery_date = date('D, F d, Y - h:i:s A');


    move_uploaded_file($gallery_image_temp, "../images/slider/$gallery_image");

    $query = "INSERT INTO gallery(gallery_date, gallery_image) ";
    $query .= "VALUES('{$gallery_date}','{$gallery_image}') ";

    $create_gallery_query = mysqli_query($connection, $query);
    confirm($create_gallery_query);
    $p_id = mysqli_insert_id($connection);

    echo "<div class='alert alert-success'><strong>Success!</strong> Image successfully added. <a href='gallery.php?p_id={$p_id}'>View Gallery</a></div>";
}
?>


<h1 class="page-header">
    Add Image Gallery
    <small></small>
</h1>
<script>
tinymce.init({
    selector: 'textarea'
});
</script>

<form action="" method="post" enctype="multipart/form-data">

    <label for="gallery_image">Gallery Image</label>
    <input type="file" name="image" class="form-group" required> </div>

    </div>
    <div class="btn-group btn-group-lg">
        <input type="submit" name="create_gallery" class="btn btn-primary" value="Upload Image">
    </div>
</form>