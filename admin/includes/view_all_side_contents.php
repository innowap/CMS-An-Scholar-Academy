    <?php
    include "delete_popup.php";




    ?>
    <?php
    // delete post function
    delete_side_contents()
    ?>
    <script>
$(document).ready(function() {
    $(".delete_link").on('click', function() {
        var id = $(this).attr("rel");
        var delete_url = "side_contents.php?delete=" + id + " ";
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
        View All Slider Banner Contents
        <small>(Please do not upload more that 4 Banners)</small>
    </h1>
    <form action="" method="post">
        <div class="col-xs-4">
            <a href="side_contents.php?source=add" class="btn btn-success pb-2">Add Side Content</a><br />
        </div>
        <br>
        <table class="table table-bordered table-striped table-hover" width="100%">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="selectAllBoxs"> </th>

                    <th>Content Titile</th>
                    <th>Content</th>
                    <th>Background Color</th>
                    <th>date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

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
                $main_content_query_count = "SELECT * FROM side_contents";
                $find_count = mysqli_query($connection, $main_content_query_count);
                $count = mysqli_num_rows($find_count);
                $count = ceil($count / 5);

                $query = "SELECT * FROM side_contents ORDER BY side_id DESC LIMIT $page_1,$per_page";
                //$query = "SELECT posts.side_id, posts.post_category_id, posts.content_title, posts.content, posts.post_date, posts.post_image, posts.post_content, posts.post_tags, posts.post_comment_count, posts.post_status, posts.post_views_count, categories.cat_id, categories.cat_title, categories.cat_image FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id ORDER BY posts.side_id DESC LIMIT $page_1,$per_page";

                $select_side_by_id = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_side_by_id)) {
                    $side_id = $row['side_id'];

                    $content_title = $row['content_title'];
                    $bgcolor = $row['bgcolor'];
                    $contents = $row['contents'];
                    $post_date = $row['post_date'];


                    echo "<tr>";
                    ?>
                <td>
                    <input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $side_id; ?>">
                </td>
                <?php
                    $contents = $row['contents'];
                    echo "<td>$content_title</td>";

                    echo "<td>$contents </a></td>";
                    echo "<td>$bgcolor </a></td>";

                    echo  "<td>$post_date</td>";

                    echo  "<td><a class='btn btn-info' href='side_contents.php?source=edit&side_id={$side_id}'>Edit</a></td>";
                    echo  "<td><a class='btn btn-danger delete_link' rel='$side_id' href='javascript:void(0)'>Delete</a></td>";
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
                    echo "<li class='active'><a href='side_contents.php?page={$i}'>{$i}</a></li>";
                } else {
                    echo "<li><a href='side_contents.php?page={$i}'>{$i}</a></li>";
                }
            }
            ?>
        </ul>
    </center>