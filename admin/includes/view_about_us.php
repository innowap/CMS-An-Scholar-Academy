    <?php
    include "delete_popup.php";




    ?>
    <?php
    // delete post function
    delete_about_us()
    ?>
    <script>
$(document).ready(function() {
    $(".delete_link").on('click', function() {
        var id = $(this).attr("rel");
        var delete_url = "about.php?delete=" + id + " ";
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
    <?php //message request
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        $msg2 = $_GET['msg2'];
    } else {
        $msg = '';
        $msg2 = '';
    }
    ?>
    <?php //message show
    msg_show($msg, $msg2);
    ?>
    <h1 class="page-header">
        Add About Us
        <small>(This will be displayed under the about us page)</small>
    </h1>
    <form action="" method="post">
        <div class="col-xs-4">
            <a href="about.php?source=add" class="btn btn-success">Add About Us</a>
        </div>
        <table class="table table-bordered table-striped table-hover" width="100%">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="selectAllBoxs"> </th>

                    <th>Title</th>
                    <th>Contents</th>
                    <th>date</th>
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
                $main_content_query_count = "SELECT * FROM about_us";
                $find_count = mysqli_query($connection, $main_content_query_count);
                $count = mysqli_num_rows($find_count);
                $count = ceil($count / 5);

                $query = "SELECT * FROM about_us ORDER BY about_us_id DESC LIMIT $page_1,$per_page";
                //$query = "SELECT posts.about_us_id, posts.post_category_id, posts.content_title, posts.content, posts.post_date, posts.post_image, posts.post_content, posts.post_tags, posts.post_comment_count, posts.post_status, posts.post_views_count, categories.cat_id, categories.cat_title, categories.cat_image FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id ORDER BY posts.about_us_id DESC LIMIT $page_1,$per_page";

                $select_main_content_by_id = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_main_content_by_id)) {
                    $about_us_id = $row['about_us_id'];

                    $about_us_title = $row['about_us_title'];
                    $content = $row['content'];
                    $post_date = $row['post_date'];


                    echo "<tr>";
                    ?>
                <td>
                    <input type="checkbox" class="checkBoxes" name="checkBoxArray[]"
                        value="<?php echo $about_us_id; ?>">
                </td>
                <?php

                    echo "<td>$about_us_title</td>";

                    echo "<td>$content </a></td>";

                    echo  "<td>$post_date</td>";

                    echo  "<td><a class='btn btn-info' href='about.php?source=edit&about_us_id={$about_us_id}'>Edit</a></td>";
                    echo  "<td><a class='btn btn-danger delete_link' rel='$about_us_id' href='javascript:void(0)'>Delete</a></td>";
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
                    echo "<li class='active'><a href='about.php?page={$i}'>{$i}</a></li>";
                } else {
                    echo "<li><a href='about.php?page={$i}'>{$i}</a></li>";
                }
            }
            ?>
        </ul>
    </center>