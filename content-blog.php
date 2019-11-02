<!-- END nav -->

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

<section class="ftco-section bg-light">
    <div class="container">

        <div class="row">



            <?php
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
                $post_query_count = "SELECT * FROM posts";
            } else {
                $post_query_count = "SELECT * FROM posts WHERE post_status = 'publish'";
            }
            $find_count = mysqli_query($connection, $post_query_count);
            $count = mysqli_num_rows($find_count);
            if ($count < 1) {
                echo "<center><div class='alert alert-info'><strong>Sorry!</strong> No post abilable.....</div></center>";
            } else {
                $count = ceil($count / 5);
                $query = "SELECT * FROM posts ORDER BY post_id DESC  LIMIT $page_1,$per_page";
                $select_all_posts_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_tags = $row['post_tags'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 100);
                    $post_status = $row['post_status'];
                    ?>
            <div class="col-md-6 col-lg-4 ftco-animate">
                <div class="blog-entry">
                    <a href="post.php?p_id=<?php echo $post_id; ?>" class="block-20 d-flex align-items-end"
                        style="background-image: url('images/post_pic/<?php echo $post_image; ?>');">
                        <div class="meta-date text-center p-2">
                            <span class="day"> <?php echo $post_date; ?></span>
                        </div>
                    </a>
                    <div class="text bg-white p-4">
                        <h3 class="heading"><a href="post.php?p_id=<?php echo $post_id; ?>">
                                <?php echo $post_title; ?> </a></h3>
                        <p><?php echo $post_content; ?></p>
                        <div class="d-flex align-items-center mt-4">
                            <p class="mb-0"><a href="post.php?p_id=<?php echo $post_id; ?>"
                                    class="btn btn-secondary">Read More <span
                                        class="ion-ios-arrow-round-forward"></span></a></p>
                            <p class="ml-auto mb-0">By
                                <a class="mr-2" href="author_post.php?author=<?php echo $post_author; ?>">
                                    <?php echo $post_author; ?> </a>

                                <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>




            <div class="row no-gutters my-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><?php
                                        for ($i = 1; $i <= $count; $i++) {
                                            if ($i == $page) {
                                                echo "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
                                            } else {
                                                echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                                            }
                                        }
                                        ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>