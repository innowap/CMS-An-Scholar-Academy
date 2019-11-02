<?php
include "delete_popup.php";




?>
<?php
// delete post function
delete_admission();

if (isset($_GET['reset'])) {
    $query = "UPDATE admission SET post_views_count = 0 WHERE admission_id =" . mysqli_real_escape_string($connection, $_GET['reset']) . " ";
    $reset_query = mysqli_query($connection, $query);
    header('Location: image-slider.php');
}
?>
<script>
$(document).ready(function() {
    $(".delete_link").on('click', function() {
        var id = $(this).attr("rel");
        var delete_url = "admission.php?delete=" + id + " ";
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
    View Admission Procedure
    <small></small>
</h1>
<form action="" method="post">
    <table class="table table-bordered table-striped table-hover" width="100%">

        <div class="col-xs-4 mb-2">
            <a href="admission.php?source=add" class="btn btn-success">Add Admission Procedure</a>
        </div>
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="selectAllBoxs"> </th>
                <th>ID</th>
                <th>Caption</th>
                <th>Procedures</th>
                <th>Admission Form</th>
                <th>Date</th>
                <th>Action</th>
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
            $post_query_count = "SELECT * FROM admission";
            $find_count = mysqli_query($connection, $post_query_count);
            $count = mysqli_num_rows($find_count);
            $count = ceil($count / 5);

            // $query = "SELECT * FROM posts ORDER BY admission_id DESC LIMIT $page_1,$per_page";
            $query = "SELECT * FROM admission ORDER BY admission_id DESC LIMIT $page_1,$per_page";

            $select_slider_by_id = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_slider_by_id)) {
                $admission_id = $row['admission_id'];
                $caption = $row['caption'];
                $contents = $row['contents'];
                $form = $row['form'];
                $post_date = $row['post_date'];

                echo "<tr>";
                ?>
            <td>
                <input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $admission_id; ?>">
            </td>
            <?php
                echo "<td>$admission_id</td>";
                echo "<td>$caption</td>";
                echo "<td>$contents</td>";
                echo "<td><a href='../forms/$form'>$form</a></td>";
                echo "<td>$post_date</td>";

                echo  "<td><a class='btn btn-sm btn-info' href='admission.php?source=edit&admission_id={$admission_id}'>Edit</a>";
                echo  "<br> <br><a class='btn btn-sm btn-danger delete_link' rel='$admission_id' href='javascript:void(0)'>Delete</a></td>";
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