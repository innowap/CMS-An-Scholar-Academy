<?php
if (isset($_GET['slider_id'])) {
    $slider_id = $_GET['slider_id'];
}

if (isset($_SESSION['username'])) {
    $s_username = $_SESSION['username'];
}

$query = "SELECT * FROM sliders WHERE slider_id = $slider_id";
$select_slider_by_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_slider_by_id)) {
    $slider_id = $row['slider_id'];
    $slider_caption = $row['slider_caption'];

    $slider_image = $row['slider_image'];
    $slider_date = $row['slider_date'];


    if (isset($_POST['update_slider'])) {
        $slider_caption = $_POST['slider_caption'];

        $slider_image = $_FILES['image']['name'];
        $slider_image_temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($slider_image_temp, "../images/slider/$slider_image");


        move_uploaded_file($slider_image_temp, "../images/slider/$slider_image");
        if (empty($slider_image)) {
            $query = "SELECT * FROM sliders WHERE slider_id = $slider_id ";
            $select_image = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_array($select_image)) {
                $slider_image = $row['slider_image'];
            }
        }

        $query = "UPDATE sliders SET ";
        $query .= "slider_caption = '{$slider_caption}', ";

        $query .= "slider_image = '{$slider_image}'";
        $query .= " WHERE slider_id = {$slider_id}";

        $update_query = mysqli_query($connection, $query);
        confirm($update_query);

        echo "<div class='alert alert-success'><strong>Success!</strong> Slider successfully updated. <a href='image-slider.php'>Edit More</a></div>";
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="slider_caption">Edit</label>
        <input type="text" class="form-control" name="slider_caption" value="<?php echo $slider_caption; ?>"> </div>

    <div class="form-group">
        <label for="slider_image">Slider Image</label> <img width="100"
            src="../images/slider/<?php echo $slider_image; ?>" alt="image">
        <input type="file" name="image"> </div>

    <div class="btn-group btn-group-lg">
        <input type="submit" name="update_slider" class="btn btn-primary" value="Update Post"> </div>
</form>