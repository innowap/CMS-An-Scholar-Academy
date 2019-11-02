<?php
if (isset($_GET['main_content_id'])) {
    $p_id = $_GET['main_content_id'];
}

if (isset($_SESSION['username'])) {
    $s_username = $_SESSION['username'];
}

$query = "SELECT * FROM main_contents WHERE main_content_id = $p_id";
$select_query_by_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_query_by_id)) {

    $main_content_id = $row['main_content_id'];

    $side_contents = $row['side_contents'];
    $main_contents = $row['main_contents'];



    if (isset($_POST['update_contents'])) {

        $side_contents = escape($_POST['side_contents']);
        $author = $s_username;
        $post_date = date('D, F d, Y - h:i:s A');
        $main_contents = escape($_POST['main_contents']);

        // $query = "UPDATE `main_contents` SET 
        // `contents` = '$contents', `side_contents` = '$side_contents', `author` = '$author', `post_date` = '$post_date' WHERE `main_contents`.`main_content_id` = $p_id";
        $query = " UPDATE main_contents SET ";
        $query .= "side_contents = '$side_contents', ";
        $query .= "main_contents = '$main_contents', ";
        $query .= "author = '$author', ";
        $query .= "post_date = '$post_date' ";
        $query .= " WHERE main_content_id = $p_id";

        $update_query = mysqli_query($connection, $query);
        confirm($update_query);


        echo "<div class='alert alert-success'><strong>Success!</strong> Post successfully updated. <a href='main_contents.php'>Edit More</a></div>";
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
        <textarea type="text" class="form-control" name="main_contents" id="" cols="30" rows="10">
                <?php echo $main_contents; ?>
        </textarea>
    </div>
    <div class="form-group">
        <textarea type="text" class="form-control" name="side_contents" id="" cols="30" rows="10">
                <?php echo $main_contents; ?>
        </textarea>
    </div>
    <div class="btn-group btn-group-lg">
        <input type="submit" name="update_contents" class="btn btn-primary" value="Update Contents"> </div>
</form>