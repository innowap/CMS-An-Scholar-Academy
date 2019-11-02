<?php
if (isset($_GET['gallery_id'])) {
    $gallery_id = $_GET['gallery_id'];
}

if (isset($_SESSION['username'])) {
    $s_username = $_SESSION['username'];
}

$query = "SELECT * FROM gallery WHERE gallery_id = $gallery_id";
$select_gallery_by_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_gallery_by_id)) {
    $gallery_id = $row['gallery_id'];


    $gallery_image = $row['gallery_image'];
    $gallery_date = $row['gallery_date'];


    if (isset($_POST['update_gallery'])) {


        $gallery_image = $_FILES['image']['name'];
        $gallery_image_temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($gallery_image_temp, "../images/gallery/$gallery_image");


        move_uploaded_file($gallery_image_temp, "../images/gallery/$gallery_image");
        if (empty($gallery_image)) {
            $query = "SELECT * FROM gallery WHERE gallery_id = $gallery_id ";
            $select_image = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_array($select_image)) {
                $gallery_image = $row['gallery_image'];
            }
        }

        $query = "UPDATE gallery SET ";

        $query .= "gallery_image = '{$gallery_image}'";
        $query .= " WHERE gallery_id = {$gallery_id}";

        $update_query = mysqli_query($connection, $query);
        confirm($update_query);

        echo "<div class='alert alert-success'><strong>Success!</strong> Gallery successfully updated. <a href='gallery.php'>Edit More</a></div>";
    }
}
?>
<h1 class="page-header">
    Edit Images Gallery
    <small></small>
</h1>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="gallery_image">Gallery Image</label> <img width="100"
            src="../images/gallery/<?php echo $gallery_image; ?>" alt="image">
        <input type="file" name="image"> </div>

    <div class="btn-group btn-group-lg">
        <input type="submit" name="update_gallery" class="btn btn-primary" value="Update Image"> </div>
</form>