<?php
include "delete_popup.php";

if (isset($_POST['checkBoxArray'])) {
    foreach ($_POST['checkBoxArray'] as $sliderId) {
        $bulk_options = $_POST['bulk_options'];
        switch ($bulk_options) {
            case 'publish':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE slider_id = {$sliderId} ";
                $update_to_publish = mysqli_query($connection, $query);
                break;

            case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE slider_id = {$sliderId} ";
                $update_to_draft = mysqli_query($connection, $query);
                break;
            case 'delete':
                $query = "delete FROM posts WHERE slider_id = {$sliderId} ";
                $update_to_delete = mysqli_query($connection, $query);
                break;
            case 'clone':
                $query = "SELECT * FROM posts WHERE slider_id = '{$sliderId}' ";
                $select_post_by_id = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_array($select_post_by_id)) {
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    $post_author = $row['post_author'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_date = $row['post_date'];
                    $post_tags = $row['post_tags'];
                }
                $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
                $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}','{$post_date}','{$post_image}','{$post_content}','{$post_tags}','{$post_status}') ";
                $clone_query = mysqli_query($connection, $query);

                break;
        }
    }
}


?>
<?php
    // delete post function
    delete_slider();

    if (isset($_GET['reset'])) {
        $query = "UPDATE posts SET post_views_count = 0 WHERE slider_id =" . mysqli_real_escape_string($connection, $_GET['reset']) . " ";
        $reset_query = mysqli_query($connection, $query);
        header('Location: image-slider.php');
    }
    ?>
<script>
$(document).ready(function() {
    $(".delete_link").on('click', function() {
        var id = $(this).attr("rel");
        var delete_url = "image-slider.php?delete=" + id + " ";
        $(".modal_delete_link").attr("href", delete_url);
        $("#myModal").modal('show');
    });
});
</script>

<script>
$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});
</script>
<?php
    //message request
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        $msg2 = $_GET['msg2'];
    } else {
        $msg = '';
        $msg2 = '';
    }
    ?>
<?php

    //message show

    msg_show($msg, $msg2);
    ?>
<h1 class="page-header">
    View slider images
    <small></small>
</h1>
<form action="" method="post">
    <table class="table table-bordered table-striped table-hover" width="100%">

        <div class="col-xs-4 mb-2">
            <a href="image-slider.php?source=add_image_slider" class="btn btn-success">Add Image Slider</a>
        </div>
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="selectAllBoxs"> </th>
                <th>ID</th>
                <th>Caption</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <!-- <tfoot align="right">
    <tr class="right">


    </tr>
</tfoot> -->
        <tbody>
            <?php
                $per_page = 5;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = "";
                }

                if ($page == "" || $page == 1) {
                    $page_1 = 0;
                } else {
                    $page_1 = ($page * $per_page) - $per_page;
                }


                ?>
            <?php
                $post_query_count = "SELECT * FROM sliders";
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);
                $count = ceil($count / 5);

                // $query = "SELECT * FROM posts ORDER BY slider_id DESC LIMIT $page_1,$per_page";
                $query = "SELECT * FROM sliders ORDER BY slider_id DESC LIMIT $page_1,$per_page";

                $select_slider_by_id = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_slider_by_id)) {
                    $slider_id = $row['slider_id'];
                    $slider_caption = $row['slider_caption'];

                    $slider_image = $row['slider_image'];

                    echo "<tr>";
                    ?>
            <td>
                <input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $slider_id; ?>">
            </td>
            <?php
                    echo "<td>$slider_id</td>";
                    echo "<td>$slider_caption</td>";

                    echo  "<td><img width='100' src='../images/slider/$slider_image' alt='image'/></td>";
                    echo  "<td><a class='btn btn-info' href='image-slider.php?source=edit_image_slider&slider_id={$slider_id}'>Edit</a></td>";
                    echo  "<td><a class='btn btn-danger delete_link' rel='$slider_id' href='javascript:void(0)'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
        </tbody>
    </table>
</form>
<center>
    <ul class="pagination pagination-lg">
        <?php
            for ($i = 1; $i <= $count; $i++) {
                if ($i == $page) {
                    echo "<li class='active'><a href='posts.php?page={$i}'>{$i}</a></li>";
                } else {
                    echo "<li><a href='posts.php?page={$i}'>{$i}</a></li>";
                }
            }
            ?>
    </ul>
</center>