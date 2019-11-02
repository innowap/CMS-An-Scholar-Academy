<?php
include "delete_popup.php";




?>
<?php
// delete post function
delete_gallery();


?>
<script>
$(document).ready(function() {
    $(".delete_link").on('click', function() {
        var id = $(this).attr("rel");
        var delete_url = "gallery.php?delete=" + id + " ";
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
    View Images Gallery
    <small></small>
</h1>
<form action="" method="post">
    <table class="table table-bordered table-striped table-hover" width="100%">

        <div class="col-xs-4 mb-2">
            <a href="gallery.php?source=add" class="btn btn-success">Add Image Gallery</a>
        </div>
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="selectAllBoxs"> </th>

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
            $post_query_count = "SELECT * FROM gallery";
            $find_count = mysqli_query($connection, $post_query_count);
            $count = mysqli_num_rows($find_count);
            $count = ceil($count / 5);

            // $query = "SELECT * FROM posts ORDER BY gallery_id DESC LIMIT $page_1,$per_page";
            $query = "SELECT * FROM gallery ORDER BY gallery_id DESC LIMIT $page_1,$per_page";

            $select_gallery_by_id = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_gallery_by_id)) {
                $gallery_id = $row['gallery_id'];


                $gallery_image = $row['gallery_image'];

                echo "<tr>";
                ?>
            <td>
                <input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $gallery_id; ?>">
            </td>
            <?php


                echo  "<td><img width='100' src='../images/gallery/$gallery_image' alt='image'/></td>";
                echo  "<td><a class='btn btn-info' href='gallery.php?source=edit&gallery_id={$gallery_id}'>Edit</a></td>";
                echo  "<td><a class='btn btn-danger delete_link' rel='$gallery_id' href='javascript:void(0)'>Delete</a></td>";
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