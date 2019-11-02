<?php

if (isset($_SESSION['username'])) {
    $s_username = $_SESSION['username'];
}


if (isset($_POST['create_content'])) {



    $about_us_title = $_POST['about_us_title'];
    $content = escape($_POST['content']);
    $post_date = date('D, F d, Y - h:i:s A');



    $query = "INSERT INTO about_us(about_us_title, post_date, content) ";
    $query .= "VALUES('{$about_us_title}','{$post_date}','{$content}') ";

    $create_content_query = mysqli_query($connection, $query);
    confirm($create_content_query);
    $p_id = mysqli_insert_id($connection);

    echo "<div class='alert alert-success'><strong>Success!</strong> Successfully added. <a href='about.php?'>View Post</a></div>";
}
?>


<h1 class="page-header">
    Add About Us
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
            <label for="contents">Title</label>
            <input type="text" name="about_us_title" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="content">Contents</label>
            <textarea type="text" class="form-control" name="content" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="btn-group btn-group-lg">
            <input type="submit" name="create_content" class="btn btn-primary" value="Publish Content"> </div>
</form>