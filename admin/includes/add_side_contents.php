<?php

if (isset($_SESSION['username'])) {
    $s_username = $_SESSION['username'];
}


if (isset($_POST['create_content'])) {



    $content_title = $_POST['content_title'];
    $contents = escape($_POST['contents']);
    $bgcolor = $_POST['bgcolor'];
    $post_date = date('D, F d, Y - h:i:s A');
    $post_comment_count = 0;


    $query = "INSERT INTO side_contents(content_title, author, post_date, contents, bgcolor) ";
    $query .= "VALUES('{$content_title}','{$s_username}','{$post_date}','{$contents}', '{$bgcolor}') ";

    $create_content_query = mysqli_query($connection, $query);
    confirm($create_content_query);
    $p_id = mysqli_insert_id($connection);

    echo "<div class='alert alert-success'><strong>Success!</strong> Contents successfully added. <a href='side_contents.php?'>View Post</a></div>";
}
?>


<h1 class="page-header">
    Add Slider Banner Contents (Maximum of 4)
    <small></small>
</h1>
<script>
tinymce.init({
    selector: 'textarea'
});
</script>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="content_title">Title</label>
        <input type="text" class="form-control" name="content_title" required> </div>
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
        <label for="contents">Post Content</label>
        <textarea type="text" class="form-control" name="contents" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="btn-group btn-group-lg">
        <input type="submit" name="create_content" class="btn btn-primary" value="Publish Content"> </div>
</form>