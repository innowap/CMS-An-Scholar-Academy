<?php

if (isset($_SESSION['username'])) {
    $s_username = $_SESSION['username'];



    if (isset($_POST['add_admission'])) {


        $caption = $_POST['caption'];
        //$contents = $_POST['contents'];

        $admission_form = $_FILES['image']['name'];
        $admission_form_temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($admission_form_temp, "../forms/$admission_form");
        $contents = escape($_POST['contents']);


        $post_date = date('D, F d, Y - h:i:s A');


        move_uploaded_file($admission_form_temp, "../forms/$admission_form");

        $query = "INSERT INTO admission (caption, contents, form, post_date, author) ";
        $query .= "VALUES('{$caption}','{$contents}','{$admission_form}','{$post_date}','{$s_username}') ";

        $create_query = mysqli_query($connection, $query);
        confirm($create_query);
        $p_id = mysqli_insert_id($connection);

        echo "<div class='alert alert-success'><strong>Success!</strong> Admission successfully added. <a href='admission.php?p_id={$p_id}'>View Admission form</a></div>";
    }
}
?>



<script>
tinymce.init({
    selector: 'textarea'
});
</script>
<h1 class="page-header">
    Add Admission
    <small>Procedure</small>
</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="caption">Caption</label>
        <input type="text" class="form-control" name="caption" required>
    </div>

    <div class="form-group">
        <label for="contents">Admission Procedures</label>
        <textarea type="text" class="form-control" name="contents" id="" cols="30" rows="10">

        </textarea>

    </div>

    <div class="form-group">
        <label for="admission_form">Admission Form</label>
        <input type="file" name="image" class="form-group">
    </div>


    <div class="btn-group btn-group-lg">
        <input type="submit" name="add_admission" class="btn btn-primary" value="Add Admission">
    </div>
</form>