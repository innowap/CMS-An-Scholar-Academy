<?php
if (isset($_GET['admission_id'])) {
    $admission_id = $_GET['admission_id'];
}

if (isset($_SESSION['username'])) {
    $s_username = $_SESSION['username'];
}

$query = "SELECT * FROM admission WHERE admission_id = $admission_id";
$select_slider_by_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_slider_by_id)) {
    $admission_id = $row['admission_id'];
    $caption = $row['caption'];
    $contents = $row['contents'];

    $form = $row['form'];
    //$post_date = $row['post_date'];
    //$author = $row['author'];


    if (isset($_POST['update_admission'])) {
        $caption = $_POST['caption'];
        $contents = $_POST['contents'];
        $post_date = date('D, F d, Y - h:i:s A');
        $author = $s_username;

        $form = $_FILES['image']['name'];
        $form_temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($form_temp, "../forms/$form");

        $contents = escape($_POST['contents']);
        if (empty($form)) {
            $query = "SELECT * FROM admission WHERE admission_id = $admission_id ";
            $select_image = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_array($select_image)) {
                $form = $row['form'];
            }
        }

        $query = "UPDATE admission SET ";
        $query .= "caption = '{$caption}', ";
        $query .= "contents = '{$contents}', ";
        $query .= "post_date = '{$post_date}', ";
        $query .= "author = '{$author}', ";

        $query .= "form = '{$form}'";
        $query .= " WHERE admission_id = {$admission_id}";

        $update_query = mysqli_query($connection, $query);
        confirm($update_query);

        echo "<div class='alert alert-success'><strong>Success!</strong> Admission successfully updated. <a href='admission.php'>Edit More</a></div>";
    }
}
?>
<script>
tinymce.init({
    selector: 'textarea'
});
</script>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="caption">Caption</label>
        <input type="text" class="form-control" name="caption" required value="<?php echo $caption; ?>">
    </div>

    <div class="form-group">
        <label for="contents">Admission Procedures</label>
        <textarea type="text" class="form-control" name="contents" id="" cols="30" rows="10">
            <?php echo $contents; ?>
        </textarea>

    </div>

    <div class="form-group">
        <label for="form">Download Form</label>
        <a href='../forms/<?php echo $form ?>'><?php echo $form ?></a>
        <input type="file" name="image" class="form-group"> </div>
    </div>


    <div class="btn-group btn-group-lg">
        <input type="submit" name="update_admission" class="btn btn-primary" value="Update Admission">
    </div>
</form>