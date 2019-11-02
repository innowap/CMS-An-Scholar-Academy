<?php

if (isset($_SESSION['username'])) {
    $s_username = $_SESSION['username'];
}


if (isset($_POST['create_content'])) {



    $main_contents = escape($_POST['main_contents']);
    $side_contents = escape($_POST['side_contents']);
    $post_date = date('D, F d, Y - h:i:s A');
    $post_comment_count = 0;


    $query = "INSERT INTO main_contents(main_contents, author, post_date, side_contents) ";
    $query .= "VALUES('{$main_contents}','{$s_username}','{$post_date}','{$side_contents}') ";

    $create_content_query = mysqli_query($connection, $query);
    confirm($create_content_query);
    $p_id = mysqli_insert_id($connection);

    echo "<div class='alert alert-success'><strong>Success!</strong> Contents successfully added. <a href='main_contents.php?'>View Post</a></div>";
}
?>


<h1 class="page-header">
    Add Main Contents
    <small></small>
</h1>
<script>
tinymce.init({
    selector: 'textarea'
});
</script>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">


        <div class="form-group">
            <label for="contents">Post Content</label>
            <textarea type="text" class="form-control" name="main_contents" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="contents">Side Contents for Proprietor</label>
            <textarea type="text" class="form-control" name="side_contents" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="btn-group btn-group-lg">
            <input type="submit" name="create_content" class="btn btn-primary" value="Publish Content"> </div>
</form>