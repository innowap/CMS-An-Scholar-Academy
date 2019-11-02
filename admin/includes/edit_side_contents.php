<?php
if (isset($_GET['side_id'])) {
    $p_id = $_GET['side_id'];
}

if (isset($_SESSION['username'])) {
    $s_username = $_SESSION['username'];
}

$query = "SELECT * FROM side_contents WHERE side_id = $p_id";
$select_query_by_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_query_by_id)) {

    $side_id = $row['side_id'];
    $content_title = $row['content_title'];
    $contents = $row['contents'];



    if (isset($_POST['update_contents'])) {

        $content_title = $_POST['content_title'];
        $bgcolor = $_POST['bgcolor'];
        $author = $s_username;
        $post_date = date('D, F d, Y - h:i:s A');
        $contents = escape($_POST['contents']);

        // $query = "UPDATE `side_contents` SET 
        // `contents` = '$contents', `content_title` = '$content_title', `author` = '$author', `post_date` = '$post_date' WHERE `side_contents`.`side_id` = $p_id";
        $query = " UPDATE side_contents SET ";
        $query .= "content_title = '$content_title', ";
        $query .= "contents = '$contents', ";
        $query .= "author = '$author', ";
        $query .= "post_date = '$post_date', ";
        $query .= "bgcolor = '$bgcolor' ";
        $query .= " WHERE side_id = $p_id";

        $update_query = mysqli_query($connection, $query);
        confirm($update_query);


        echo "<div class='alert alert-success'><strong>Success!</strong> Post successfully updated. <a href='side_contents.php'>Edit More</a></div>";
    }
}
?>
<script>
tinymce.init({
    selector: 'textarea'

});
</script>
<h1 class="page-header">
    Edit Slider Banner Contents
    <small> (You can change the background color)</small>
</h1>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="content_title">Title</label>
        <input type="text" class="form-control" name="content_title" value="<?php echo $content_title; ?>">
    </div>
    <div class="form-group">
        <label for="bgcolor">Select Color</label>
        <select name="bgcolor" id="" class="form-control">
            <option value="primary">Blue</option>
            <option value="tertiary">Green</option>
            <option value="fifth">Purple</option>
            <option value="quarternary">Red</option>
        </select>
    </div>


    <div class="form-group">
        <textarea type="text" class="form-control" name="contents" id="" cols="30" rows="10">
                <?php echo $contents; ?>
        </textarea>
    </div>
    <div class="btn-group btn-group-lg">
        <input type="submit" name="update_contents" class="btn btn-primary" value="Update Contents"> </div>
</form>