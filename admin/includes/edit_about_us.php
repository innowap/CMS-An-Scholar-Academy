<?php
if (isset($_GET['about_us_id'])) {
    $p_id = $_GET['about_us_id'];
}

if (isset($_SESSION['username'])) {
    $s_username = $_SESSION['username'];
}

$query = "SELECT * FROM about_us WHERE about_us_id = $p_id";
$select_query_by_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_query_by_id)) {

    $about_us_id = $row['about_us_id'];

    $about_us_title = $row['about_us_title'];
    $content = $row['content'];



    if (isset($_POST['update_contents'])) {

        $about_us_title = $_POST['about_us_title'];
        $content = escape($_POST['content']);

        $post_date = date('D, F d, Y - h:i:s A');

        // $query = "UPDATE `main_contents` SET 
        // `contents` = '$contents', `side_contents` = '$side_contents', `author` = '$author', `post_date` = '$post_date' WHERE `main_contents`.`about_us_id` = $p_id";
        $query = " UPDATE about_us SET ";
        $query .= "about_us_title = '$about_us_title', ";
        $query .= "content = '$content', ";
        $query .= "post_date = '$post_date' ";
        $query .= " WHERE about_us_id = $p_id";

        $update_query = mysqli_query($connection, $query);
        confirm($update_query);


        echo "<div class='alert alert-success'><strong>Success!</strong> Successfully updated. <a href='about.php'>Edit More</a></div>";
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
        <input type="text" class="form-control" name="about_us_title" id="" value="<?php echo $about_us_title; ?>">


        </textarea>
    </div>
    <div class="form-group">
        <textarea type="text" class="form-control" name="content" id="" cols="30" rows="10">
                <?php echo $content; ?>
        </textarea>
    </div>
    <div class="btn-group btn-group-lg">
        <input type="submit" name="update_contents" class="btn btn-primary" value="Update Contents"> </div>
</form>